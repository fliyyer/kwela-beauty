@extends('layouts.app')

@section('title', 'Promotions - Kwéla Beauty Studio')

@section('content')
<!-- Header -->
<section class="bg-kwela-beige py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-kwela-maroon">Special Offers</h1>
        <p class="mt-4 text-lg text-kwela-dark">Don't miss out on our exclusive promotions</p>
    </div>
</section>

<!-- Promotions Grid -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($promotions as $promo)
            <div class="bg-kwela-cream rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="bg-kwela-maroon text-white p-4">
                    <div class="flex justify-between items-center">
                        <span class="text-3xl font-bold">{{ $promo->discount }}%</span>
                        <span class="text-sm">OFF</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-kwela-maroon">{{ $promo->title }}</h3>
                    <p class="mt-3 text-kwela-dark">{{ $promo->description }}</p>
                    
                    @if($promo->start_date || $promo->end_date)
                    <div class="mt-4 text-sm text-kwela-dark">
                        <p>Valid: {{ $promo->start_date ? $promo->start_date->format('M d, Y') : 'Now' }} - {{ $promo->end_date ? $promo->end_date->format('M d, Y') : 'Until further notice' }}</p>
                    </div>
                    @endif
                    
                    <div class="mt-6">
                        <a href="{{ route('booking.create') }}" class="inline-block bg-kwela-maroon text-white px-6 py-2 rounded-md hover:bg-opacity-90 transition-colors font-semibold">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-2 text-center py-12">
                <div class="text-5xl mb-4">🎉</div>
                <h3 class="text-xl font-semibold text-kwela-dark">No Active Promotions</h3>
                <p class="mt-2 text-kwela-dark">Check back soon for exciting offers!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-kwela-beige">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-kwela-maroon">Want to Stay Updated?</h2>
        <p class="mt-4 text-kwela-dark">
            Follow us on social media to be the first to know about new promotions and offers.
        </p>
        <div class="mt-8">
            <a href="{{ route('contact') }}" class="text-kwela-maroon font-semibold hover:underline">
                Contact Us for More Info →
            </a>
        </div>
    </div>
</section>
@endsection
