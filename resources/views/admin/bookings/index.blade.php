@extends('admin.layouts.app')

@section('title', 'Bookings - Kwéla Beauty Admin')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Bookings</h1>
    <p class="text-gray-600">Manage customer appointments</p>
</div>

<!-- Filter -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <form action="{{ route('admin.bookings.index') }}" method="GET" class="flex items-center space-x-4">
        <label class="text-sm text-gray-600">Filter by Status:</label>
        <select name="status" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon">
            <option value="all">All</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </form>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date & Time</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Services</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($bookings as $booking)
            <tr>
                <td class="px-6 py-4">
                    <p class="font-medium text-gray-800">{{ $booking->customer_name }}</p>
                    <p class="text-sm text-gray-500">{{ $booking->email }}</p>
                    <p class="text-sm text-gray-500">{{ $booking->phone }}</p>
                </td>
                <td class="px-6 py-4 text-gray-600">
                    <p>{{ $booking->booking_date->format('M d, Y') }}</p>
                    <p class="text-sm">{{ $booking->booking_time }}</p>
                </td>
                <td class="px-6 py-4">
                    <ul class="text-sm text-gray-600">
                        @foreach($booking->services as $service)
                        <li>{{ $service->name }} ({{ $service->formatted_price }})</li>
                        @endforeach
                    </ul>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $booking->status_badge_class }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No bookings found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
