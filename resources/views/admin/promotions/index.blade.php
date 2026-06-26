@extends('admin.layouts.app')

@section('title', 'Promotions - Kwéla Beauty Admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Promotions</h1>
        <p class="text-gray-600">Manage your special offers</p>
    </div>
    <a href="{{ route('admin.promotions.create') }}" class="bg-kwela-maroon text-white px-4 py-2 rounded-md hover:bg-opacity-90">
        + Add New Promotion
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Discount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Valid Period</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($promotions as $promo)
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        @if($promo->image)
                        <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->title }}" class="w-12 h-12 object-cover rounded mr-4">
                        @else
                        <div class="w-12 h-12 bg-kwela-maroon rounded flex items-center justify-center mr-4">
                            <span class="text-white font-bold">{{ $promo->discount }}%</span>
                        </div>
                        @endif
                        <div>
                            <p class="font-medium text-gray-800">{{ $promo->title }}</p>
                            <p class="text-sm text-gray-500">{{ Str::limit($promo->description, 40) }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $promo->formatted_discount }}</td>
                <td class="px-6 py-4 text-gray-600 text-sm">
                    @if($promo->start_date || $promo->end_date)
                        {{ $promo->start_date ? $promo->start_date->format('M d, Y') : 'N/A' }} - 
                        {{ $promo->end_date ? $promo->end_date->format('M d, Y') : 'N/A' }}
                    @else
                        No expiration
                    @endif
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $promo->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($promo->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.promotions.edit', $promo->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('admin.promotions.destroy', $promo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this promotion?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No promotions found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
