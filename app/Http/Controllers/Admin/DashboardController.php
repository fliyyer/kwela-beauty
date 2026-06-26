<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Promotion;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalBookings = Booking::count();
        $todayBookings = Booking::today()->count();
        $totalServices = Service::count();
        $activeServices = Service::where('status', 'active')->count();
        $totalPromotions = Promotion::count();
        $activePromotions = Promotion::where('status', 'active')->count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();

        return view('admin.dashboard', compact(
            'totalBookings',
            'todayBookings',
            'totalServices',
            'activeServices',
            'totalPromotions',
            'activePromotions',
            'pendingBookings',
            'confirmedBookings',
            'completedBookings',
            'cancelledBookings'
        ));
    }
}
