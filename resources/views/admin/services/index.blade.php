@extends('admin.layouts.app')

@section('title', 'Services - Kwéla Beauty Admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Services</h1>
        <p class="text-gray-600">Manage your beauty services</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="bg-kwela-maroon text-white px-4 py-2 rounded-md hover:bg-opacity-90">
        + Add New Service
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($services as $service)
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-12 h-12 object-cover rounded mr-4">
                        @else
                        <div class="w-12 h-12 bg-kwela-beige rounded flex items-center justify-center mr-4">
                            <span>💅</span>
                        </div>
                        @endif
                        <div>
                            <p class="font-medium text-gray-800">{{ $service->name }}</p>
                            <p class="text-sm text-gray-500">{{ Str::limit($service->description, 50) }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $service->formatted_price }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $service->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($service->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No services found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
