<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $whatsapp = Setting::getValue('whatsapp', '');
        $instagram = Setting::getValue('instagram', '');
        $address = Setting::getValue('address', '');
        $mapsLink = Setting::getValue('maps_link', '');
        $bookingStartTime = Setting::getValue('booking_start_time', '10:00');
        $bookingEndTime = Setting::getValue('booking_end_time', '17:00');

        return view('admin.settings.index', compact('whatsapp', 'instagram', 'address', 'mapsLink', 'bookingStartTime', 'bookingEndTime'));
    }

    /**
     * Update the settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'whatsapp' => 'required|string|max:20',
            'instagram' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'maps_link' => 'required|url|max:500',
            'booking_start_time' => 'required|string|max:10',
            'booking_end_time' => 'required|string|max:10',
        ]);

        Setting::setValue('whatsapp', $validated['whatsapp']);
        Setting::setValue('instagram', $validated['instagram']);
        Setting::setValue('address', $validated['address']);
        Setting::setValue('maps_link', $validated['maps_link']);
        Setting::setValue('booking_start_time', $validated['booking_start_time']);
        Setting::setValue('booking_end_time', $validated['booking_end_time']);

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
