@extends('admin.layouts.app')

@section('title', 'Edit Service - Kwéla Beauty Admin')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Edit Service</h1>
        <p class="text-gray-600">Update service information</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-kwela-maroon hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        Back
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm p-6">
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Service Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('name') border-red-500 @enderror"
                    required>
                @error('name')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price (Rp) *</label>
                <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}" min="0" step="0.01"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('price') border-red-500 @enderror"
                    required>
                @error('price')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" id="description" rows="4" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('description') border-red-500 @enderror">{{ old('description', $service->description) }}</textarea>
            @error('description')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            @if($service->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-32 h-32 object-cover rounded">
            </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full @error('image') border-red-500 @enderror">
            <p class="mt-1 text-sm text-gray-500">Max size: 2MB. Accepted formats: JPEG, PNG, JPG, GIF, SVG. Leave empty to keep current image.</p>
            @error('image')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6">
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
            <select name="status" id="status" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('status') border-red-500 @enderror"
                required>
                <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                Cancel
            </a>
            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2 bg-kwela-maroon text-white rounded-md hover:bg-opacity-90">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/></svg>
                Update Service
            </button>
        </div>
    </form>
</div>
@endsection
