@extends('layouts.app')

@section('title', 'Booking Received - Kwéla Beauty Studio')

@section('content')
<section class="py-16 bg-white min-h-[60vh] flex items-center">
    <div class="max-w-md mx-auto px-6 text-center">
        <!-- Success Icon -->
        <div class="mb-8">
            <div class="w-16 h-16 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>
        
        <!-- Success Message -->
        <h1 class="text-2xl font-bold text-kwela-maroon tracking-tight">Booking Received!</h1>
        <p class="mt-3 text-sm text-zinc-500 leading-relaxed">
            Thank you for your booking. We have received your appointment request.
        </p>
        <p class="mt-1 text-xs text-zinc-400">
            Admin akan segera melakukan konfirmasi jadwal Anda melalui WhatsApp.
        </p>
        
        <!-- Additional Info -->
        <div class="mt-6 p-5 bg-zinc-50 border border-zinc-200 rounded-lg text-left">
            <h3 class="font-semibold text-kwela-maroon text-xs uppercase tracking-wider mb-3">What's Next?</h3>
            <ul class="text-xs text-zinc-500 space-y-2 font-medium">
                <li class="flex items-start gap-2">
                    <span class="text-zinc-400">1.</span>
                    <span>Our team will review your booking request.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-zinc-400">2.</span>
                    <span>You will receive a confirmation via WhatsApp or email.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-zinc-400">3.</span>
                    <span>Please arrive 10 minutes before your scheduled appointment.</span>
                </li>
            </ul>
        </div>
        
        <!-- Back to Home Button -->
        <div class="mt-8">
            <a href="{{ route('home') }}" class="inline-block bg-kwela-maroon hover:bg-kwela-maroon/90 text-white px-6 py-2.5 rounded-md text-xs font-semibold uppercase tracking-wider shadow-sm transition-colors">
                Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
