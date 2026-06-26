@extends('layouts.app')

@section('title', 'Kwéla Beauty Studio - Your Beauty Destination')

@section('content')
<!-- Hero Section -->
<section class="relative bg-kwela-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-kwela-maroon leading-tight">
                    Discover Your <br>Natural Beauty
                </h1>
                <p class="mt-4 text-lg text-kwela-dark">
                    Experience premium beauty services at Kwéla Beauty Studio. Our expert beauticians are dedicated to making you look and feel your best.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('booking.create') }}" class="bg-kwela-maroon text-white px-6 py-3 rounded-md hover:bg-opacity-90 transition-colors text-center font-semibold">
                        Book Your Service Today
                    </a>
                    <a href="{{ route('services.index') }}" class="border-2 border-kwela-maroon text-kwela-maroon px-6 py-3 rounded-md hover:bg-kwela-maroon hover:text-white transition-colors text-center font-semibold">
                        View Services
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="bg-white rounded-lg shadow-xl p-4">
                    <div class="aspect-w-16 aspect-h-9 bg-gradient-to-br from-kwela-beige to-kwela-brown rounded-lg flex items-center justify-center">
                        <div class="text-center p-8">
                            <div class="text-6xl mb-4">💅</div>
                            <p class="text-kwela-maroon font-semibold">Professional Beauty Services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-kwela-maroon">Our Services</h2>
            <p class="mt-2 text-kwela-dark">Discover our range of beauty services designed for you</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredServices as $service)
            <div class="bg-kwela-cream rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="h-32 bg-kwela-beige rounded-lg mb-4 flex items-center justify-center">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="h-full w-full object-cover rounded-lg">
                        @else
                        <div class="text-4xl">✨</div>
                        @endif
                    </div>
                    <h3 class="text-xl font-semibold text-kwela-maroon">{{ $service->name }}</h3>
                    <p class="mt-2 text-sm text-kwela-dark">{{ Str::limit($service->description, 100) }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-lg font-bold text-kwela-maroon">{{ $service->formatted_price }}</span>
                        <a href="{{ route('booking.create') }}" class="text-sm bg-kwela-maroon text-white px-3 py-1 rounded-md hover:bg-opacity-90">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <p class="col-span-3 text-center text-kwela-dark">No services available at the moment.</p>
            @endforelse
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('services.index') }}" class="text-kwela-maroon font-semibold hover:underline">
                View All Services →
            </a>
        </div>
    </div>
</section>

<!-- Promotions Highlight -->
@if($activePromotions->count() > 0)
<section class="py-16 bg-kwela-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-kwela-maroon">Special Offers</h2>
            <p class="mt-2 text-kwela-dark">Don't miss out on our exclusive promotions</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($activePromotions->take(2) as $promo)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/3 bg-kwela-maroon flex items-center justify-center p-6">
                        <div class="text-center text-white">
                            <div class="text-4xl font-bold">{{ $promo->discount }}%</div>
                            <div class="text-sm">OFF</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-6">
                        <h3 class="text-xl font-semibold text-kwela-maroon">{{ $promo->title }}</h3>
                        <p class="mt-2 text-sm text-kwela-dark">{{ Str::limit($promo->description, 100) }}</p>
                        <div class="mt-4">
                            <a href="{{ route('promotions.index') }}" class="text-kwela-maroon font-semibold text-sm hover:underline">
                                Learn More →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16 bg-kwela-maroon">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white">Ready to Look Your Best?</h2>
        <p class="mt-4 text-kwela-beige">
            Book an appointment today and let our expert team pamper you with our premium beauty services.
        </p>
        <div class="mt-8">
            <a href="{{ route('booking.create') }}" class="bg-white text-kwela-maroon px-8 py-3 rounded-md hover:bg-kwela-beige transition-colors font-semibold">
                Book Your Appointment Now
            </a>
        </div>
    </div>
</section>
@endsection
