@extends('admin.layouts.app')

@section('title', 'Promotions - Kwéla Beauty Admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Promotions</h1>
        <p class="text-gray-600">Manage your special offers</p>
    </div>
    <a href="{{ route('admin.promotions.create') }}" class="bg-[#5d3a3a] text-white px-4 py-2 rounded-full hover:bg-opacity-90 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
        Add New Promotion
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
                        <div class="w-12 h-12 bg-[#5d3a3a] rounded flex items-center justify-center mr-4">
                            <span class="text-white font-bold text-sm">{{ $promo->discount }}%</span>
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
                        <a href="{{ route('admin.promotions.edit', $promo->id) }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.promotions.destroy', $promo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this promotion?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                Delete
                            </button>
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
