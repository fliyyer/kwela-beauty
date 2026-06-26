@extends('layouts.app')

@section('title', 'Book Appointment - Kwéla Beauty Studio')

@section('content')
<!-- Header -->
<section class="bg-kwela-beige py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-kwela-maroon">Book Your Appointment</h1>
        <p class="mt-4 text-lg text-kwela-dark">Schedule your beauty session with us</p>
    </div>
</section>

<!-- Booking Form -->
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('booking.store') }}" method="POST" class="bg-kwela-cream rounded-lg shadow-sm p-8">
            @csrf
            
            <!-- Customer Information -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-kwela-maroon mb-4">Customer Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="customer_name" class="block text-sm font-medium text-kwela-dark mb-1">Full Name *</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" 
                            class="w-full px-4 py-2 border border-kwela-brown rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('customer_name') border-red-500 @enderror"
                            required>
                        @error('customer_name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-kwela-dark mb-1">Email Address *</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                            class="w-full px-4 py-2 border border-kwela-brown rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('email') border-red-500 @enderror"
                            required>
                        @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-4">
                    <label for="phone" class="block text-sm font-medium text-kwela-dark mb-1">WhatsApp Number *</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                        class="w-full px-4 py-2 border border-kwela-brown rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('phone') border-red-500 @enderror"
                        placeholder="e.g., 085126485450" required>
                    @error('phone')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Appointment Details -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-kwela-maroon mb-4">Appointment Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="booking_date" class="block text-sm font-medium text-kwela-dark mb-1">Date *</label>
                        <input type="date" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" 
                            min="{{ date('Y-m-d') }}"
                            class="w-full px-4 py-2 border border-kwela-brown rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('booking_date') border-red-500 @enderror"
                            required>
                        @error('booking_date')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="booking_time" class="block text-sm font-medium text-kwela-dark mb-1">Time *</label>
                        <select name="booking_time" id="booking_time" 
                            class="w-full px-4 py-2 border border-kwela-brown rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon @error('booking_time') border-red-500 @enderror"
                            required>
                            <option value="">Select a time</option>
                            <option value="09:00" {{ old('booking_time') == '09:00' ? 'selected' : '' }}>09:00</option>
                            <option value="10:00" {{ old('booking_time') == '10:00' ? 'selected' : '' }}>10:00</option>
                            <option value="11:00" {{ old('booking_time') == '11:00' ? 'selected' : '' }}>11:00</option>
                            <option value="12:00" {{ old('booking_time') == '12:00' ? 'selected' : '' }}>12:00</option>
                            <option value="13:00" {{ old('booking_time') == '13:00' ? 'selected' : '' }}>13:00</option>
                            <option value="14:00" {{ old('booking_time') == '14:00' ? 'selected' : '' }}>14:00</option>
                            <option value="15:00" {{ old('booking_time') == '15:00' ? 'selected' : '' }}>15:00</option>
                            <option value="16:00" {{ old('booking_time') == '16:00' ? 'selected' : '' }}>16:00</option>
                            <option value="17:00" {{ old('booking_time') == '17:00' ? 'selected' : '' }}>17:00</option>
                            <option value="18:00" {{ old('booking_time') == '18:00' ? 'selected' : '' }}>18:00</option>
                        </select>
                        @error('booking_time')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Services Selection -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-kwela-maroon mb-4">Select Services *</h2>
                
                @error('services')
                <p class="mt-1 text-sm text-red-500 mb-2">{{ $message }}</p>
                @enderror
                @error('services.*')
                <p class="mt-1 text-sm text-red-500 mb-2">{{ $message }}</p>
                @enderror
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($services as $service)
                    <label class="flex items-center p-4 bg-white border border-kwela-brown rounded-md cursor-pointer hover:border-kwela-maroon transition-colors">
                        <input type="checkbox" name="services[]" value="{{ $service->id }}" 
                            class="w-5 h-5 text-kwela-maroon border-kwela-brown rounded focus:ring-kwela-maroon"
                            {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                        <div class="ml-3 flex-1">
                            <span class="block text-sm font-medium text-kwela-dark">{{ $service->name }}</span>
                            <span class="block text-sm text-kwela-maroon">{{ $service->formatted_price }}</span>
                        </div>
                    </label>
                    @empty
                    <p class="col-span-2 text-center text-kwela-dark py-4">No services available at the moment.</p>
                    @endforelse
                </div>
            </div>

            <!-- Additional Notes -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-kwela-maroon mb-4">Additional Notes (Optional)</h2>
                <textarea name="notes" id="notes" rows="3" 
                    class="w-full px-4 py-2 border border-kwela-brown rounded-md focus:outline-none focus:ring-2 focus:ring-kwela-maroon"
                    placeholder="Any special requests or notes...">{{ old('notes') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-kwela-maroon text-white px-8 py-3 rounded-md hover:bg-opacity-90 transition-colors font-semibold">
                    Submit Booking
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
