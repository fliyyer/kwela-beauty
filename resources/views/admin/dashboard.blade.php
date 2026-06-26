@extends('admin.layouts.app')

@section('title', 'Dashboard - Kwéla Beauty Admin')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600">Welcome to Kwéla Beauty Studio Admin Panel</p>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Bookings -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Bookings</p>
                <p class="text-3xl font-bold text-kwela-maroon">{{ $totalBookings }}</p>
            </div>
            <div class="w-12 h-12 bg-kwela-beige rounded-full flex items-center justify-center">
                <span class="text-2xl">📅</span>
            </div>
        </div>
    </div>

    <!-- Today's Bookings -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Today's Bookings</p>
                <p class="text-3xl font-bold text-kwela-maroon">{{ $todayBookings }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                <span class="text-2xl">📆</span>
            </div>
        </div>
    </div>

    <!-- Active Services -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Active Services</p>
                <p class="text-3xl font-bold text-kwela-maroon">{{ $activeServices }} / {{ $totalServices }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <span class="text-2xl">💅</span>
            </div>
        </div>
    </div>

    <!-- Active Promotions -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Active Promotions</p>
                <p class="text-3xl font-bold text-kwela-maroon">{{ $activePromotions }} / {{ $totalPromotions }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <span class="text-2xl">🎉</span>
            </div>
        </div>
    </div>
</div>

<!-- Booking Status -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Pending -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-400">
        <p class="text-gray-500 text-sm">Pending</p>
        <p class="text-2xl font-bold text-yellow-600">{{ $pendingBookings }}</p>
    </div>

    <!-- Confirmed -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-400">
        <p class="text-gray-500 text-sm">Confirmed</p>
        <p class="text-2xl font-bold text-blue-600">{{ $confirmedBookings }}</p>
    </div>

    <!-- Completed -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-400">
        <p class="text-gray-500 text-sm">Completed</p>
        <p class="text-2xl font-bold text-green-600">{{ $completedBookings }}</p>
    </div>

    <!-- Cancelled -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-red-400">
        <p class="text-gray-500 text-sm">Cancelled</p>
        <p class="text-2xl font-bold text-red-600">{{ $cancelledBookings }}</p>
    </div>
</div>

<!-- Quick Links -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.bookings.index') }}" class="flex items-center justify-center p-4 bg-kwela-beige rounded-lg hover:bg-kwela-brown transition-colors">
            <span class="mr-2">📅</span>
            <span class="font-medium text-kwela-dark">View All Bookings</span>
        </a>
        <a href="{{ route('admin.services.index') }}" class="flex items-center justify-center p-4 bg-kwela-beige rounded-lg hover:bg-kwela-brown transition-colors">
            <span class="mr-2">💅</span>
            <span class="font-medium text-kwela-dark">Manage Services</span>
        </a>
        <a href="{{ route('admin.promotions.index') }}" class="flex items-center justify-center p-4 bg-kwela-beige rounded-lg hover:bg-kwela-brown transition-colors">
            <span class="mr-2">🎉</span>
            <span class="font-medium text-kwela-dark">Manage Promotions</span>
        </a>
        <a href="{{ route('admin.settings.index') }}" class="flex items-center justify-center p-4 bg-kwela-beige rounded-lg hover:bg-kwela-brown transition-colors">
            <span class="mr-2">⚙️</span>
            <span class="font-medium text-kwela-dark">Settings</span>
        </a>
    </div>
</div>
@endsection
