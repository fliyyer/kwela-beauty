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
    public function index(Request $request)
    {
        $date = $request->input('date');

        // Base query for bookings metrics (filtered by date if provided)
        $bookingQuery = Booking::query();
        if ($date) {
            $bookingQuery->where('booking_date', $date);
        }

        $totalBookings = (clone $bookingQuery)->count();
        $todayBookings = Booking::today()->count();
        $totalServices = Service::count();
        $activeServices = Service::where('status', 'active')->count();
        $totalPromotions = Promotion::count();
        $activePromotions = Promotion::where('status', 'active')->count();
        
        $pendingBookings = (clone $bookingQuery)->where('status', 'pending')->count();
        $confirmedBookings = (clone $bookingQuery)->where('status', 'confirmed')->count();
        $completedBookings = (clone $bookingQuery)->where('status', 'completed')->count();
        $cancelledBookings = (clone $bookingQuery)->where('status', 'cancelled')->count();

        // Calculate Revenue for completed bookings in the filtered period
        $filteredBookings = (clone $bookingQuery)->with('services')->where('status', 'completed')->get();
        $filteredRevenue = $filteredBookings->sum('total_price');

        // Revenue for the current calendar month
        $startOfMonth = now()->startOfMonth()->toDateString();
        $endOfMonth = now()->endOfMonth()->toDateString();
        $monthCompletedBookings = Booking::with('services')
            ->where('status', 'completed')
            ->whereBetween('booking_date', [$startOfMonth, $endOfMonth])
            ->get();
        $monthRevenue = $monthCompletedBookings->sum('total_price');

        // Overall total revenue
        $allCompletedBookings = Booking::with('services')->where('status', 'completed')->get();
        $totalRevenue = $allCompletedBookings->sum('total_price');

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
            'cancelledBookings',
            'filteredRevenue',
            'monthRevenue',
            'totalRevenue',
            'date'
        ));
    }
}
