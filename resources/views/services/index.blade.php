@extends('layouts.app')

@section('title', 'Our Services - Kwéla Beauty Studio')

@section('content')
<!-- Header -->
<section class="bg-kwela-beige py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-kwela-maroon">Our Services</h1>
        <p class="mt-4 text-lg text-kwela-dark">Discover our range of premium beauty services</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @forelse($services as $service)
        <div class="bg-kwela-cream rounded-lg shadow-sm overflow-hidden mb-8 hover:shadow-md transition-shadow">
            <div class="md:flex">
                <div class="md:w-1/3 bg-kwela-beige flex items-center justify-center p-6">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="h-48 w-full object-cover rounded-lg">
                    @else
                    <div class="text-6xl">💅</div>
                    @endif
                </div>
                <div class="md:w-2/3 p-6 flex flex-col justify-center">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-semibold text-kwela-maroon">{{ $service->name }}</h3>
                            <p class="mt-2 text-kwela-dark">{{ $service->description }}</p>
                        </div>
                        <div class="text-right ml-4">
                            <span class="text-2xl font-bold text-kwela-maroon">{{ $service->formatted_price }}</span>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('booking.create') }}" class="bg-kwela-maroon text-white px-6 py-2 rounded-md hover:bg-opacity-90 transition-colors font-semibold">
                            Book This Service
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-12">
            <div class="text-5xl mb-4">😔</div>
            <h3 class="text-xl font-semibold text-kwela-dark">No Services Available</h3>
            <p class="mt-2 text-kwela-dark">Please check back later for our services.</p>
        </div>
        @endforelse
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-kwela-beige">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-kwela-maroon">Ready to Book?</h2>
        <p class="mt-4 text-kwela-dark">
            Schedule your appointment today and let our expert team take care of you.
        </p>
        <div class="mt-8">
            <a href="{{ route('booking.create') }}" class="bg-kwela-maroon text-white px-8 py-3 rounded-md hover:bg-opacity-90 transition-colors font-semibold">
                Book Your Appointment
            </a>
        </div>
    </div>
</section>
@endsection
