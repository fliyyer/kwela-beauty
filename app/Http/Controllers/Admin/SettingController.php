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

        return view('admin.settings.index', compact('whatsapp', 'instagram', 'address', 'mapsLink'));
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
        ]);

        Setting::setValue('whatsapp', $validated['whatsapp']);
        Setting::setValue('instagram', $validated['instagram']);
        Setting::setValue('address', $validated['address']);
        Setting::setValue('maps_link', $validated['maps_link']);

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
