@extends('layouts.app')

@section('title', 'Contact Us - Kwéla Beauty Studio')

@section('content')
<!-- Header -->
<section class="bg-kwela-beige py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-kwela-maroon">Contact Us</h1>
        <p class="mt-4 text-lg text-kwela-dark">We'd love to hear from you</p>
    </div>
</section>

<!-- Contact Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-semibold text-kwela-maroon mb-6">Get in Touch</h2>
                
                <div class="space-y-6">
                    <!-- WhatsApp -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-kwela-beige rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">📱</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-kwela-dark">WhatsApp</h3>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" class="text-kwela-maroon hover:underline">
                                {{ $whatsapp }}
                            </a>
                        </div>
                    </div>
                    
                    <!-- Instagram -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-kwela-beige rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">📸</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-kwela-dark">Instagram</h3>
                            <a href="https://instagram.com/{{ str_replace('@', '', $instagram) }}" target="_blank" class="text-kwela-maroon hover:underline">
                                {{ $instagram }}
                            </a>
                        </div>
                    </div>
                    
                    <!-- Address -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-kwela-beige rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">📍</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-kwela-dark">Address</h3>
                            <p class="text-kwela-dark">{{ $address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map -->
            <div>
                <h2 class="text-2xl font-semibold text-kwela-maroon mb-6">Find Us</h2>
                <div class="bg-kwela-cream rounded-lg overflow-hidden h-80">
                    <iframe 
                        src="{{ $mapsLink }}" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="mt-4">
                    <a href="{{ $mapsLink }}" target="_blank" class="text-kwela-maroon font-semibold hover:underline">
                        Open in Google Maps →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-kwela-beige">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-kwela-maroon">Ready to Visit?</h2>
        <p class="mt-4 text-kwela-dark">
            Book an appointment today and experience the Kwéla Beauty difference.
        </p>
        <div class="mt-8">
            <a href="{{ route('booking.create') }}" class="bg-kwela-maroon text-white px-8 py-3 rounded-md hover:bg-opacity-90 transition-colors font-semibold">
                Book Your Appointment
            </a>
        </div>
    </div>
</section>
@endsection
