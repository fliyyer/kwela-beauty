@extends('layouts.app')

@section('title', 'Kwéla Beauty Studio - Your Beauty Destination')

@section('content')
<!-- Modern Immersive Hero Section -->
<section class="relative min-h-[70vh] flex items-center justify-center px-4 py-12 md:py-20 overflow-hidden bg-zinc-950 text-white border-b border-zinc-900">
    
    <!-- Background Image with sophisticated dark warm overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/header-hero.png') }}" 
             alt="Kwéla Beauty Studio Header" 
             class="w-full h-full object-cover object-center opacity-20 select-none">
            <!-- Cinematic dark gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-zinc-950 via-zinc-950/95 to-zinc-900/40"></div>
            <!-- Glow highlights -->
            <div class="absolute top-1/4 -left-24 w-96 h-96 bg-zinc-800/20 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute -bottom-24 right-1/4 w-[500px] h-[500px] bg-zinc-900/30 rounded-full blur-[100px] pointer-events-none"></div>
        </div>

        <!-- Hero Content Layout -->
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Side: Editorial Typography -->
            <div class="lg:col-span-6 space-y-6 text-left">
                <div class="inline-flex items-center gap-2 bg-zinc-900 border border-zinc-800 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-[0.25em] text-zinc-300">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Premium Aesthetic Sanctuary
                </div>
                
                <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold leading-[1.1] text-white tracking-tight">
                    Discover Your <br> 
                    <span class="text-zinc-450 italic font-light">Natural Beauty</span>
                </h1>
                
                <p class="text-base text-zinc-400 max-w-xl leading-relaxed font-light">
                    Nikmati rangkaian ritual kecantikan eksklusif di <strong class="font-medium text-white">Kwéla Beauty Studio</strong>. Kami mendedikasikan keahlian terbaik untuk memancarkan pesona autentik Anda setiap hari.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('booking.create') }}" class="bg-kwela-maroon hover:bg-kwela-maroon/90 text-white text-center px-8 py-3.5 rounded-md font-semibold shadow hover:scale-[1.01] active:scale-98 transition-colors duration-200 text-sm">
                        Book Your Service Today
                    </a>
                    <a href="{{ route('services.index') }}" class="border border-zinc-800 hover:border-zinc-700 hover:bg-zinc-900/50 text-white text-center px-8 py-3.5 rounded-md font-semibold transition-all duration-200 text-sm">
                        View Our Services
                    </a>
                </div>
            </div>

            <!-- Right Side: Luxury Asymmetrical Image Grid -->
            <div class="lg:col-span-6">
                <div class="grid grid-cols-12 gap-4 h-[420px] md:h-[500px] w-full">
                    <!-- Large Main Image (Eyelash) -->
                    <div class="col-span-7 rounded-lg overflow-hidden shadow-2xl relative group h-full border border-zinc-900">
                        <img src="https://images.unsplash.com/photo-1589710751893-f9a6770ad71b?q=80&w=1200&auto=format&fit=crop" 
                             alt="Premium Eyelash Extension" 
                             class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-700 ease-out">
                        <div class="absolute bottom-6 left-6 bg-zinc-950/75 backdrop-blur-md border border-zinc-850 px-4 py-2 rounded-md text-white text-xs font-semibold tracking-wider">
                            ✨ Eyelash
                        </div>
                    </div>
                    
                    <!-- Right Stack (Haircut & Lashlift) -->
                    <div class="col-span-4 flex flex-col gap-4 h-full">
                        <!-- Haircut Card -->
                        <div class="h-1/2 rounded-lg overflow-hidden shadow-xl relative group border border-zinc-900">
                            <img src="https://images.unsplash.com/photo-1560869713-7d0a29430803?auto=format&fit=crop&q=80&w=800" 
                                 alt="Signature Haircut" 
                                 class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-700 ease-out">
                            <div class="absolute bottom-4 left-4 bg-zinc-950/75 backdrop-blur-md border border-zinc-850 px-3 py-1.5 rounded-md text-white text-[10px] font-semibold tracking-wider">
                                ✂️ Haircut
                            </div>
                        </div>
                        <!-- Lashlift Card -->
                        <div class="h-1/2 rounded-lg overflow-hidden shadow-xl relative group border border-zinc-900">
                            <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&q=80&w=800" 
                                 alt="Signature Lashlift" 
                                 class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-700 ease-out">
                            <div class="absolute bottom-4 left-4 bg-zinc-950/75 backdrop-blur-md border border-zinc-850 px-3 py-1.5 rounded-md text-white text-[10px] font-semibold tracking-wider">
                                👁️ Lashlift
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Modern Featured Services Section -->
<section class="py-20 bg-zinc-50/50">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-zinc-900 tracking-tight mb-2">Our Premium Services</h2>
            <p class="text-zinc-500 text-sm">Curated beauty treatments designed to enhance your natural radiance.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredServices as $service)
            <div class="group bg-white p-3 rounded-lg shadow-sm border border-zinc-200 transition-all duration-300 hover:shadow hover:border-zinc-300 flex flex-col justify-between">
                <div>
                    <div class="aspect-[4/3] rounded-md overflow-hidden mb-6 bg-zinc-100 border border-zinc-200/60">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-500">
                        @else
                        <img src="https://images.unsplash.com/photo-1589710751893-f9a6770ad71b?auto=format&fit=crop&q=80&w=600" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-500">
                        @endif
                    </div>
                    <div class="px-2 pb-4">
                        <h3 class="text-lg font-bold text-zinc-900 mb-2">{{ $service->name }}</h3>
                        <p class="text-zinc-500 text-xs mb-6 leading-relaxed">{{ Str::limit($service->description, 100) }}</p>
                    </div>
                </div>
                <div class="px-2 pb-2 pt-2 flex items-center justify-between border-t border-zinc-100 mt-auto">
                    <span class="text-base font-bold text-zinc-955">{{ $service->formatted_price }}</span>
                    <a href="{{ route('booking.create') }}" class="text-xs bg-kwela-maroon text-white hover:bg-kwela-maroon/90 px-4 py-2 rounded-md font-semibold shadow-sm transition-colors">Book Now</a>
                </div>
            </div>
            @empty
            <p class="col-span-3 text-center text-zinc-500 text-sm">No services available at the moment.</p>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('services.index') }}" class="inline-flex items-center text-zinc-900 font-semibold border-b border-zinc-900 hover:opacity-70 transition-opacity pb-0.5 text-sm">
                View All Services &rarr;
            </a>
        </div>
    </div>
</section>

<!-- Promotions -->
@if($activePromotions->count() > 0)
<section class="py-20 bg-zinc-100/50 border-t border-b border-zinc-200/60">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-zinc-900 tracking-tight mb-2">Special Offers</h2>
            <p class="text-zinc-500 text-sm">Exclusive deals crafted just for you.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($activePromotions->take(2) as $promo)
            <div class="bg-white p-5 rounded-lg shadow-sm border border-zinc-200 flex items-center gap-6">
                <div class="bg-kwela-maroon w-20 h-20 rounded-lg flex-shrink-0 flex flex-col items-center justify-center text-white font-bold shadow-sm">
                    <span class="text-2xl">{{ $promo->discount }}%</span>
                    <span class="text-[9px] uppercase tracking-wider opacity-85">Off</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-zinc-900">{{ $promo->title }}</h3>
                    <p class="text-zinc-500 text-xs mt-1.5 leading-relaxed">{{ Str::limit($promo->description, 80) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

   <!-- Modernized CTA Section -->
    <section class="py-24 px-8">
        <div class="max-w-4xl mx-auto bg-kwela-maroon rounded-2xl p-12 text-center relative overflow-hidden shadow-lg border border-kwela-maroon/20">
            <div class="relative z-10">
                <h2 class="text-3xl font-bold text-white mb-4">Ready to Look Your Best?</h2>
                <p class="text-zinc-250 text-sm mb-8 max-w-md mx-auto text-kwela-cream leading-relaxed">
                    Book an appointment today and let our expert team pamper you with our premium beauty services.
                </p>
                <a href="{{ route('booking.create') }}" class="inline-block bg-white text-kwela-maroon px-8 py-3.5 rounded-md font-semibold hover:bg-zinc-100 transition-all transform hover:scale-[1.01] active:scale-[0.99] shadow-md text-sm">
                    Book Your Appointment Now
                </a>
            </div>
            <!-- Decorative circle -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
        </div>
    </section>
@endsection
