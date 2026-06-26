@extends('layouts.app')

@section('title', 'Booking Received - Kwéla Beauty Studio')

@section('content')
<section class="py-16 bg-white min-h-[60vh] flex items-center">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Success Icon -->
        <div class="mb-8">
            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>
        
        <!-- Success Message -->
        <h1 class="text-3xl font-bold text-kwela-maroon">Booking Received!</h1>
        <p class="mt-4 text-lg text-kwela-dark">
            Thank you for your booking. We have received your appointment request.
        </p>
        <p class="mt-2 text-sm text-kwela-dark">
            Admin will confirm your schedule via WhatsApp or email shortly.
        </p>
        
        <!-- Additional Info -->
        <div class="mt-8 p-6 bg-kwela-cream rounded-lg">
            <h3 class="font-semibold text-kwela-maroon mb-2">What's Next?</h3>
            <ul class="text-left text-sm text-kwela-dark space-y-2">
                <li class="flex items-start">
                    <span class="mr-2">1.</span>
                    Our team will review your booking request
                </li>
                <li class="flex items-start">
                    <span class="mr-2">2.</span>
                    You will receive a confirmation via WhatsApp or email
                </li>
                <li class="flex items-start">
                    <span class="mr-2">3.</span>
                    Please arrive 10 minutes before your scheduled appointment
                </li>
            </ul>
        </div>
        
        <!-- Back to Home Button -->
        <div class="mt-8">
            <a href="{{ route('home') }}" class="inline-block bg-kwela-maroon text-white px-6 py-3 rounded-md hover:bg-opacity-90 transition-colors font-semibold">
                Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
