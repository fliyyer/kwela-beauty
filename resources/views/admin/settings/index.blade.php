@extends('admin.layouts.app')

@section('title', 'Settings - Kwéla Beauty Admin')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Contact Settings</h1>
    <p class="text-gray-600">Manage your studio contact information</p>
</div>

<div class="bg-white rounded-lg shadow-sm p-6">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $whatsapp) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('whatsapp') border-red-500 @enderror"
                    placeholder="e.g., 085126485450">
                @error('whatsapp')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="instagram" class="block text-sm font-medium text-gray-700 mb-1">Instagram Username</label>
                <input type="text" name="instagram" id="instagram" value="{{ old('instagram', $instagram) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('instagram') border-red-500 @enderror"
                    placeholder="e.g., @kwela_beautystudio">
                @error('instagram')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
            <textarea name="address" id="address" rows="3" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('address') border-red-500 @enderror">{{ old('address', $address) }}</textarea>
            @error('address')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6">
            <label for="maps_link" class="block text-sm font-medium text-gray-700 mb-1">Google Maps Embed URL</label>
            <input type="url" name="maps_link" id="maps_link" value="{{ old('maps_link', $mapsLink) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('maps_link') border-red-500 @enderror"
                placeholder="https://maps.google.com/?q=...">
            <p class="mt-1 text-sm text-gray-500">Get this from Google Maps -> Share -> Embed a map</p>
            @error('maps_link')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-8 flex justify-end">
            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2 bg-kwela-maroon text-white rounded-md hover:bg-opacity-90">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
