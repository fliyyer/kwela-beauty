<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        $whatsapp = Setting::getValue('whatsapp', '085126485450');
        $instagram = Setting::getValue('instagram', '@kwela_beautystudio');
        $address = Setting::getValue('address', 'Kwela Beauty Studio');
        $mapsLink = Setting::getValue('maps_link', 'https://maps.google.com/?q=-6.200000,106.816666');
        
        return view('contact.index', compact('whatsapp', 'instagram', 'address', 'mapsLink'));
    }
}
