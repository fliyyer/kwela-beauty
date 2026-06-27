<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Voucher;
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
        
        return view('booking.create', compact('services'));
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

        // Calculate original total
        $services = Service::whereIn('id', $request->service_ids)->get();
        $originalTotal = $services->sum('price');

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
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            'notes' => 'nullable|string',
            'voucher_code' => 'nullable|string',
        ]);

        return DB::transaction(function () use ($validated) {
            $voucher = null;
            $discount = 0.0;

            // Resolve services to calculate original price
            $services = Service::whereIn('id', $validated['services'])->get();
            $originalTotal = $services->sum('price');

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

            // Attach services to booking
            foreach ($services as $service) {
                $booking->services()->attach($service->id, ['price' => $service->price]);
            }

            // Increment usage if voucher was applied
            if ($voucher) {
                $voucher->increment('usage_count');
            }

            return redirect()->route('booking.success');
        });
    }

    /**
     * Display booking success page.
     */
    public function success()
    {
        return view('booking.success');
    }
}
