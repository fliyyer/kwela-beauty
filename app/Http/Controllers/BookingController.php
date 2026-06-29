<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Voucher;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display the booking form.
     */
    public function create()
    {
        $services = Service::active()->get();
        
        $startTimeStr = Setting::getValue('booking_start_time', '10:00');
        $endTimeStr = Setting::getValue('booking_end_time', '17:00');
        
        $startHour = (int) explode(':', $startTimeStr)[0];
        $endHour = (int) explode(':', $endTimeStr)[0];
        
        $times = [];
        for ($hour = $startHour; $hour <= $endHour; $hour++) {
            $times[] = sprintf('%02d:00', $hour);
        }
        
        return view('booking.create', compact('services', 'times'));
    }

    /**
     * Apply voucher code (AJAX validation).
     */
    public function applyVoucher(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string',
            'service_ids' => 'required|array',
            'service_ids.*' => 'exists:services,id',
        ]);

        $code = strtoupper($request->voucher_code);
        $voucher = Voucher::active()->where('code', $code)->first();

        if (!$voucher) {
            return response()->json([
                'valid' => false,
                'message' => 'Kode voucher tidak ditemukan atau sudah tidak aktif.',
            ]);
        }

        if (!$voucher->isValid()) {
            return response()->json([
                'valid' => false,
                'message' => 'Voucher sudah kedaluwarsa atau batas kuota penggunaan telah terpenuhi.',
            ]);
        }

        // Calculate original total (using discounted base price if any promotion is active)
        $services = Service::whereIn('id', $request->service_ids)->get();
        $originalTotal = $services->sum('discounted_price');

        if (!$voucher->isValidForAmount($originalTotal)) {
            return response()->json([
                'valid' => false,
                'message' => 'Minimal transaksi untuk menggunakan voucher ini adalah ' . $voucher->formatted_min_booking . '.',
            ]);
        }

        $discount = $voucher->calculateDiscount($originalTotal);
        $finalTotal = max(0.0, $originalTotal - $discount);

        return response()->json([
            'valid' => true,
            'voucher_id' => $voucher->id,
            'voucher_code' => $voucher->code,
            'discount_amount' => $discount,
            'formatted_discount' => 'Rp ' . number_format($discount, 0, ',', '.'),
            'final_total' => $finalTotal,
            'formatted_final_total' => 'Rp ' . number_format($finalTotal, 0, ',', '.'),
            'message' => 'Voucher ' . $voucher->code . ' berhasil diterapkan! Potongan ' . $voucher->formatted_value . '.',
        ]);
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'booking_date' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attribute, $value, $fail) use ($request) {
                    $services = $request->services;
                    if (!is_array($services)) {
                        return;
                    }
                    $bookedServiceIds = DB::table('booking_services')
                        ->join('bookings', 'booking_services.booking_id', '=', 'bookings.id')
                        ->where('bookings.booking_date', $value)
                        ->where('bookings.booking_time', $request->booking_time)
                        ->where('bookings.status', '!=', 'cancelled')
                        ->pluck('booking_services.service_id')
                        ->toArray();

                    $conflictingServices = array_intersect($services, $bookedServiceIds);
                    if (!empty($conflictingServices)) {
                        $serviceNames = Service::whereIn('id', $conflictingServices)->pluck('name')->implode(', ');
                        $fail("Layanan berikut sudah dipesan pada jam tersebut: {$serviceNames}. Silakan pilih waktu/hari atau layanan lain.");
                    }
                }
            ],
            'booking_time' => 'required',
            'services' => 'required|array|max:2',
            'services.*' => 'exists:services,id',
            'notes' => 'nullable|string',
            'voucher_code' => 'nullable|string',
        ]);

        return DB::transaction(function () use ($validated) {
            $voucher = null;
            $discount = 0.0;

            // Resolve services to calculate original price (using discounted base price if any promotion is active)
            $services = Service::whereIn('id', $validated['services'])->get();
            $originalTotal = $services->sum('discounted_price');

            if (!empty($validated['voucher_code'])) {
                $code = strtoupper($validated['voucher_code']);
                $voucher = Voucher::active()->where('code', $code)->first();

                if ($voucher && $voucher->isValidForAmount($originalTotal)) {
                    $discount = $voucher->calculateDiscount($originalTotal);
                } else {
                    // Fail silently or clear voucher details if invalid on final checkout
                    $voucher = null;
                    $discount = 0.0;
                }
            }

            $booking = Booking::create([
                'customer_name' => $validated['customer_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'booking_date' => $validated['booking_date'],
                'booking_time' => $validated['booking_time'],
                'status' => 'pending',
                'notes' => $validated['notes'] ?? null,
                'voucher_id' => $voucher ? $voucher->id : null,
                'voucher_code' => $voucher ? $voucher->code : null,
                'discount_amount' => $discount,
            ]);

            // Attach services to booking using the discounted price
            foreach ($services as $service) {
                $booking->services()->attach($service->id, ['price' => $service->discounted_price]);
            }

            // Increment usage if voucher was applied
            if ($voucher) {
                $voucher->increment('usage_count');
            }



            // Construct Pakasir payment URL if configured
            $slug = config('services.pakasir.slug');
            $apiKey = config('services.pakasir.api_key');
            $amount = (int) $booking->total_price;

            if ($slug && $apiKey && $amount > 0) {
                $redirectUrl = route('booking.success') . '?order_id=' . $booking->invoice_number;
                $payUrl = "https://app.pakasir.com/pay/{$slug}/{$amount}?order_id={$booking->invoice_number}&redirect=" . urlencode($redirectUrl);
                return redirect()->away($payUrl);
            }

            return redirect()->route('booking.success', ['order_id' => $booking->id]);
        });
    }

    /**
     * Display booking success page and check payment status if redirected back.
     */
    public function success(Request $request)
    {
        $booking = null;
        if ($request->has('order_id')) {
            $orderId = $request->order_id;
            $bookingId = $orderId;
            
            // If the order_id is in invoice format (e.g., INV-280626-005), extract the raw ID from the end
            if ($orderId && str_starts_with($orderId, 'INV-')) {
                $parts = explode('-', $orderId);
                $bookingId = (int) end($parts);
            }
            
            $booking = Booking::find($bookingId);
            
            if ($booking && $booking->status === 'pending') {
                $slug = config('services.pakasir.slug');
                $apiKey = config('services.pakasir.api_key');
                $amount = (int) $booking->total_price;

                if ($slug && $apiKey && $amount > 0) {
                    try {
                        $response = \Illuminate\Support\Facades\Http::get('https://app.pakasir.com/api/transactiondetail', [
                            'project' => $slug,
                            'amount' => $amount,
                            'order_id' => $orderId, // pass the original invoice format to Pakasir
                            'api_key' => $apiKey,
                        ]);

                        if ($response->successful()) {
                            $data = $response->json();
                            $status = $data['transaction']['status'] ?? '';
                            if ($status === 'completed') {
                                $this->confirmBooking($booking);
                            }
                        }
                    } catch (\Exception $e) {
                        // Fail silently on API issues to avoid breaking success page display
                    }
                }
            }
        }

        return view('booking.success', compact('booking'));
    }

    /**
     * Handle Pakasir payment status webhook.
     */
    public function webhook(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'amount' => 'required',
            'status' => 'required|string',
            'project' => 'required|string',
        ]);

        $orderId = $request->order_id;
        $bookingId = $orderId;

        // If the order_id is in invoice format (e.g., INV-280626-005), extract the raw ID from the end
        if (str_starts_with($orderId, 'INV-')) {
            $parts = explode('-', $orderId);
            $bookingId = (int) end($parts);
        }

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $slug = config('services.pakasir.slug');
        $apiKey = config('services.pakasir.api_key');

        if (!$slug || !$apiKey) {
            return response()->json(['message' => 'Pakasir credentials not configured'], 500);
        }

        try {
            // Verify payment status directly with Pakasir Transaction Detail API
            $response = \Illuminate\Support\Facades\Http::get('https://app.pakasir.com/api/transactiondetail', [
                'project' => $slug,
                'amount' => $request->amount,
                'order_id' => $orderId,
                'api_key' => $apiKey,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $status = $data['transaction']['status'] ?? '';

                if ($status === 'completed') {
                    $this->confirmBooking($booking);
                    return response()->json(['status' => 'success', 'message' => 'Payment confirmed and booking updated']);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }

        return response()->json(['status' => 'ignored', 'message' => 'Transaction not completed or invalid']);
    }

    private function confirmBooking(Booking $booking)
    {
        if ($booking->status === 'pending') {
            $booking->status = 'confirmed';
            $booking->save();

            // Send confirmation notifications (Email & WhatsApp) once payment is confirmed
            try {
                $booking->load('services');
                \App\Services\NotificationService::sendBookingConfirmation($booking);
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to send booking confirmation notifications after payment: ' . $e->getMessage());
            }
        }
    }

    /**
     * Check booked services for a specific date and time (AJAX check).
     */
    public function checkBookedServices(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        $bookedServiceIds = DB::table('booking_services')
            ->join('bookings', 'booking_services.booking_id', '=', 'bookings.id')
            ->where('bookings.booking_date', $request->date)
            ->where('bookings.booking_time', $request->time)
            ->where('bookings.status', '!=', 'cancelled')
            ->pluck('booking_services.service_id')
            ->toArray();

        return response()->json($bookedServiceIds);
    }
}
