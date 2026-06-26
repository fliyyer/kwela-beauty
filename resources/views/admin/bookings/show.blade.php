@extends('admin.layouts.app')

@section('title', 'Booking Details - Kwéla Beauty Admin')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Booking Details</h1>
        <p class="text-gray-600">View booking information</p>
    </div>
    <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center gap-2 text-kwela-maroon hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        Back to Bookings
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Customer Information -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Customer Information</h2>
        <dl class="space-y-3">
            <div class="flex">
                <dt class="w-32 text-gray-500">Name:</dt>
                <dd class="text-gray-800">{{ $booking->customer_name }}</dd>
            </div>
            <div class="flex">
                <dt class="w-32 text-gray-500">Email:</dt>
                <dd class="text-gray-800">{{ $booking->email }}</dd>
            </div>
            <div class="flex">
                <dt class="w-32 text-gray-500">Phone:</dt>
                <dd class="text-gray-800">{{ $booking->phone }}</dd>
            </div>
        </dl>
    </div>

    <!-- Appointment Details -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Appointment Details</h2>
        <dl class="space-y-3">
            <div class="flex">
                <dt class="w-32 text-gray-500">Date:</dt>
                <dd class="text-gray-800">{{ $booking->booking_date->format('M d, Y') }}</dd>
            </div>
            <div class="flex">
                <dt class="w-32 text-gray-500">Time:</dt>
                <dd class="text-gray-800">{{ $booking->booking_time }}</dd>
            </div>
            <div class="flex">
                <dt class="w-32 text-gray-500">Total:</dt>
                <dd class="text-gray-800 font-semibold">{{ $booking->formatted_total }}</dd>
            </div>
            <div class="flex">
                <dt class="w-32 text-gray-500">Status:</dt>
                <dd>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $booking->status_badge_class }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </dd>
            </div>
        </dl>
    </div>

    <!-- Services -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Selected Services</h2>
        <ul class="space-y-2">
            @foreach($booking->services as $service)
            <li class="flex justify-between items-center py-2 border-b border-gray-100 last:border-0">
                <span class="text-gray-800">{{ $service->name }}</span>
                <span class="text-gray-600">{{ $service->formatted_price }}</span>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Notes -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Notes</h2>
        <p class="text-gray-600">{{ $booking->notes ?? 'No notes provided.' }}</p>
    </div>
</div>

<!-- Status Update -->
<div class="mt-6 bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Update Status</h2>
    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="flex items-center space-x-4">
        @csrf
        @method('PATCH')
        <select name="status" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon">
            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
        <button type="submit" class="inline-flex items-center gap-2 px-6 py-2 bg-kwela-maroon text-white rounded-md hover:bg-opacity-90">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/></svg>
            Update Status
        </button>
    </form>
</div>
@endsection
