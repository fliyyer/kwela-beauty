@extends('layouts.app')

@section('title', 'Kwéla Beauty Studio - Your Beauty Destination')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Inter', sans-serif; }
    h1 { font-family: 'Playfair Display', serif; }
</style>
@endpush

@section('content')
<!-- Modern Immersive Hero Section (Matching Promotions Header) -->
<section class="relative min-h-[70vh] flex items-center justify-center px-4 py-12 md:py-20 overflow-hidden bg-stone-950 text-white">
    
    <!-- Background Image with sophisticated dark warm overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/header-hero.png') }}" 
             alt="Kwéla Beauty Studio Header" 
             class="w-full h-full object-cover object-center opacity-30 select-none">
            <!-- Cinematic dark gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-stone-950 via-stone-950/95 to-stone-900/40"></div>
            <!-- Warm glowing ambient lights -->
            <div class="absolute top-1/4 -left-24 w-96 h-96 bg-[#5d3a3a]/40 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute -bottom-24 right-1/4 w-[500px] h-[500px] bg-stone-100/10 rounded-full blur-[100px] pointer-events-none"></div>
            <div class="absolute top-1/2 right-10 w-80 h-80 bg-stone-200/5 rounded-full blur-[110px] pointer-events-none"></div>
        </div>

        <!-- Hero Content Layout -->
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Side: Editorial Typography -->
            <div class="lg:col-span-6 space-y-6 text-left">
                <div class="inline-flex items-center gap-2 bg-[#5d3a3a]/40 border border-[#5d3a3a]/60 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-[0.25em] text-stone-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                    Premium Aesthetic Sanctuary
                </div>
                
                <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold leading-[1.1] text-white">
                    Discover Your <br> 
                    <span class="text-stone-300 italic font-light font-serif">Natural Beauty</span>
                </h1>
                
                <p class="text-lg text-stone-300 max-w-xl leading-relaxed font-light">
                    Nikmati rangkaian ritual kecantikan eksklusif di <strong class="font-medium text-white">Kwéla Beauty Studio</strong>. Kami mendedikasikan keahlian terbaik untuk memancarkan pesona autentik Anda setiap hari.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <a href="#" class="bg-[#5d3a3a] hover:bg-white hover:text-[#5d3a3a] text-center px-8 py-4 rounded-full font-semibold shadow-lg hover:scale-[1.03] active:scale-95 transition-all duration-300 border border-[#5d3a3a]">
                        Book Your Service Today
                    </a>
                    <a href="#" class="border border-white/20 hover:border-white hover:bg-white/5 text-white text-center px-8 py-4 rounded-full font-semibold transition-all duration-300">
                        View Our Services
                    </a>
                </div>
            </div>

            <!-- Right Side: Luxury Asymmetrical Image Grid -->
            <div class="lg:col-span-6">
                <div class="grid grid-cols-12 gap-4 h-[420px] md:h-[500px] w-full">
                    <!-- Large Main Image (Eyelash) -->
                    <div class="col-span-7 rounded-[2.5rem] overflow-hidden shadow-2xl relative group h-full border border-white/10">
                        <img src="https://images.unsplash.com/photo-1589710751893-f9a6770ad71b?q=80&w=1200&auto=format&fit=crop" 
                             alt="Premium Eyelash Extension" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        <div class="absolute bottom-6 left-6 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-2xl text-white text-xs font-semibold tracking-wider">
                            ✨ Eyelash
                        </div>
                    </div>
                    
                    <!-- Right Stack (Haircut & Lashlift) -->
                    <div class="col-span-4 flex flex-col gap-4 h-full">
                        <!-- Haircut Card -->
                        <div class="h-1/2 rounded-[2rem] overflow-hidden shadow-xl relative group border border-white/10">
                            <img src="https://images.unsplash.com/photo-1560869713-7d0a29430803?auto=format&fit=crop&q=80&w=800" 
                                 alt="Signature Haircut" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <div class="absolute bottom-4 left-4 bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1.5 rounded-xl text-white text-[10px] font-semibold tracking-wider">
                                ✂️ Haircut
                            </div>
                        </div>
                        <!-- Lashlift Card -->
                        <div class="h-1/2 rounded-[2rem] overflow-hidden shadow-xl relative group border border-white/10">
                            <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&q=80&w=800" 
                                 alt="Signature Lashlift" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <div class="absolute bottom-4 left-4 bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1.5 rounded-xl text-white text-[10px] font-semibold tracking-wider">
                                👁️ Lashlift
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Modern Featured Services Section -->
<section class="py-20 bg-stone-50">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-stone-900 mb-4">Our Premium Services</h2>
            <p class="text-stone-600 text-lg">Curated beauty treatments designed to enhance your natural radiance.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredServices as $service)
            <div class="group bg-white p-3 rounded-3xl shadow-sm border border-stone-100 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-6">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <img src="https://images.unsplash.com/photo-1589710751893-f9a6770ad71b?auto=format&fit=crop&q=80&w=600" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @endif
                </div>
                <div class="px-3 pb-4">
                    <h3 class="text-xl font-bold text-stone-900 mb-2">{{ $service->name }}</h3>
                    <p class="text-stone-600 text-sm mb-6 leading-relaxed">{{ Str::limit($service->description, 100) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-stone-900">{{ $service->formatted_price }}</span>
                        <a href="{{ route('booking.create') }}" class="text-sm bg-stone-900 text-white px-5 py-2 rounded-full hover:bg-stone-700 transition">Book Now</a>
                    </div>
                </div>
            </div>
            @empty
            <p class="col-span-3 text-center text-stone-600">No services available at the moment.</p>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('services.index') }}" class="inline-flex items-center text-stone-800 font-semibold border-b-2 border-stone-800 hover:opacity-70 transition">
                View All Services &rarr;
            </a>
        </div>
    </div>
</section>

<!-- Promotions -->
@if($activePromotions->count() > 0)
<section class="py-20 bg-stone-100">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-stone-900 mb-4">Special Offers</h2>
            <p class="text-stone-600 text-lg">Exclusive deals crafted just for you.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($activePromotions->take(2) as $promo)
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-stone-100 flex items-center gap-6">
                <div class="bg-[#5d3a3a] w-24 h-24 rounded-2xl flex-shrink-0 flex flex-col items-center justify-center text-white font-bold">
                    <span class="text-3xl">{{ $promo->discount }}%</span>
                    <span class="text-xs uppercase tracking-wider">Off</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-stone-900">{{ $promo->title }}</h3>
                    <p class="text-stone-600 text-sm mt-2">{{ Str::limit($promo->description, 80) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

   <!-- Modernized CTA Section -->
    <section class="py-24 px-8">
        <div class="max-w-4xl mx-auto bg-[#5d3a3a] rounded-[3rem] p-12 text-center relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-4xl font-bold text-white mb-6">Ready to Look Your Best?</h2>
                <p class="text-stone-200 text-lg mb-10 max-w-lg mx-auto">
                    Book an appointment today and let our expert team pamper you with our premium beauty services.
                </p>
                <a href="{{ route('booking.create') }}" class="inline-block bg-white text-[#5d3a3a] px-10 py-4 rounded-full font-semibold hover:bg-stone-100 transition-all transform hover:scale-105 shadow-xl">
                    Book Your Appointment Now
                </a>
            </div>
            <!-- Decorative circle -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl"></div>
        </div>
    </section>
@endsection
