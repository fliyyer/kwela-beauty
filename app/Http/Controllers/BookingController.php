<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

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
        ]);

        $booking = Booking::create([
            'customer_name' => $validated['customer_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        // Attach services to booking
        $services = Service::whereIn('id', $validated['services'])->get();
        foreach ($services as $service) {
            $booking->services()->attach($service->id, ['price' => $service->price]);
        }

        return redirect()->route('booking.success');
    }

    /**
     * Display booking success page.
     */
    public function success()
    {
        return view('booking.success');
    }
}
