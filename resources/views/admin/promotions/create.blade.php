@extends('admin.layouts.app')

@section('title', 'Add Promotion - Kwéla Beauty Admin')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Add New Promotion</h1>
    <p class="text-gray-600">Create a special offer</p>
</div>

<div class="bg-white rounded-lg shadow-sm p-6">
    <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('title') border-red-500 @enderror"
                    required>
                @error('title')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="discount" class="block text-sm font-medium text-gray-700 mb-1">Discount (%)</label>
                <input type="number" name="discount" id="discount" value="{{ old('discount') }}" min="0" max="100"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('discount') border-red-500 @enderror">
                @error('discount')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" id="description" rows="4" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('start_date') border-red-500 @enderror">
                @error('start_date')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('end_date') border-red-500 @enderror">
                @error('end_date')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full @error('image') border-red-500 @enderror">
            <p class="mt-1 text-sm text-gray-500">Max size: 2MB. Accepted formats: JPEG, PNG, JPG, GIF, SVG</p>
            @error('image')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6">
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
            <select name="status" id="status" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('status') border-red-500 @enderror"
                required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.promotions.index') }}" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2 bg-kwela-maroon text-white rounded-md hover:bg-opacity-90">
                Create Promotion
            </button>
        </div>
    </form>
</div>
@endsection
