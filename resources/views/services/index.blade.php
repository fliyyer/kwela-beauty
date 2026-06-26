@extends('layouts.app')

@section('title', 'Our Services - Kwéla Beauty Studio')

@section('content')
<!-- Header Section with Immersive Editorial Aesthetic (Matching Promotions Page) -->
<section class="relative py-28 md:py-36 bg-stone-950 text-white overflow-hidden">
    <!-- Background Image with sophisticated dark warm overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/header-hero.png') }}" 
             alt="Kwéla Beauty Studio Header" 
             class="w-full h-full object-cover object-center opacity-35 select-none">
        <!-- Cinematic dark gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-stone-950 via-stone-950/95 to-stone-900/40"></div>
        <!-- Warm glowing ambient lights -->
        <div class="absolute top-1/4 -left-24 w-96 h-96 bg-[#5d3a3a]/40 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute -bottom-24 right-1/4 w-80 h-80 bg-stone-100/10 rounded-full blur-[100px] pointer-events-none"></div>
    </div>

    <!-- Content Layout -->
    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Editorial Headline -->
        <div class="lg:col-span-8 space-y-6 text-left">
            <div class="inline-flex items-center gap-2 bg-[#5d3a3a]/40 border border-[#5d3a3a]/60 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-[0.25em] text-stone-200">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                Premium Care
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold leading-[1.1] text-white" style="font-family: 'Playfair Display', serif;">
                Our Signature <br>
                <span class="text-stone-300 italic font-light">Beauty Rituals</span>
            </h1>
            
            <p class="text-stone-300 text-base md:text-lg max-w-2xl leading-relaxed font-light">
                Temukan rangkaian perawatan premium yang dirancang secara personal di <strong class="font-medium text-white">Kwéla Beauty Studio</strong>. Mulai dari presisi guntingan rambut hingga kelentikan bulu mata sempurna, kami mendedikasikan keahlian terbaik untuk keanggunan Anda.
            </p>
        </div>

        <!-- Glassmorphic Accent Box (Right Side) -->
        <div class="lg:col-span-4 hidden lg:block">
            <div class="border border-white/10 bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] space-y-4 shadow-2xl relative">
                <!-- Highlight Ribbon -->
                <span class="text-[10px] font-bold tracking-[0.2em] text-amber-400 uppercase block">Kwéla Standard</span>
                <h3 class="text-xl font-bold text-white leading-snug">Personalized Analysis</h3>
                <p class="text-stone-300 text-xs leading-relaxed font-light">
                    Setiap sesi dimulai dengan konsultasi dan analisis tipe rambut atau bulu mata secara detail oleh tim terapis bersertifikat kami untuk menjamin hasil terbaik.
                </p>
                <div class="absolute -top-4 -right-4 w-12 h-12 bg-[#5d3a3a] rounded-2xl flex items-center justify-center shadow-lg border border-white/10">
                    ✨
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid Section -->
<section class="py-24 bg-stone-50">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
            <!-- Interactive Card Layout -->
            <div class="group bg-white rounded-[2.5rem] shadow-sm border border-stone-100 overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col justify-between">
                <div>
                    <!-- Image Container with Intelligent Failback -->
                    <div class="aspect-[4/3] relative overflow-hidden bg-stone-200">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="{{ $service->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                        @endif
                        
                        <!-- Fallback Placeholder with luxury pattern if image doesn't load/exist -->
                        <div class="absolute inset-0 bg-gradient-to-br from-[#5d3a3a]/10 to-[#5d3a3a]/30 flex flex-col items-center justify-center text-center p-6 {{ $service->image ? 'hidden' : 'flex' }}">
                            <svg class="w-12 h-12 text-[#5d3a3a]/40 mb-3" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" />
                            </svg>
                            <span class="text-xs uppercase tracking-widest text-[#5d3a3a]/60 font-semibold">Kwéla Care</span>
                        </div>
                    </div>
                    
                    <!-- Content Details -->
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#5d3a3a]"></span>
                            <span class="text-[10px] uppercase tracking-widest text-stone-400 font-bold">Premium Session</span>
                        </div>
                        <h3 class="text-xl font-bold text-stone-900 group-hover:text-[#5d3a3a] transition-colors duration-300 mb-3 leading-snug">
                            {{ $service->name }}
                        </h3>
                        <p class="text-stone-600 text-sm leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
                
                <!-- Pricing & Action -->
                <div class="px-8 pb-8 pt-2">
                    <div class="flex items-center justify-between border-t border-stone-100 pt-6 mt-auto">
                        <div class="flex flex-col">
                            <span class="text-[10px] uppercase tracking-wider text-stone-400 font-semibold">Investment</span>
                            <span class="text-lg font-bold text-[#5d3a3a]">{{ $service->formatted_price }}</span>
                        </div>
                        <a href="{{ route('booking.create') }}" class="bg-[#5d3a3a] hover:bg-stone-950 text-white px-6 py-3 rounded-xl text-xs font-semibold tracking-wider uppercase shadow-md hover:shadow-xl transition-all duration-300">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <!-- Elegant Empty State -->
            <div class="col-span-full text-center py-24 bg-white rounded-[3rem] border border-stone-100 shadow-sm max-w-2xl mx-auto px-8">
                <div class="w-24 h-24 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-stone-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-[#5d3a3a] mb-2" style="font-family: 'Playfair Display', serif;">No Services Listed</h3>
                <p class="text-stone-500 text-sm max-w-md mx-auto leading-relaxed">
                    We are currently detailing our luxurious list of treatments. Please contact our front desk to consult about booking dynamic services directly.
                </p>
                <div class="mt-8">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-[#5d3a3a] text-white px-8 py-3.5 rounded-full font-semibold hover:bg-stone-800 transition-all">
                        Contact Our Desk
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Premium Call to Action Section -->
<section class="py-24 px-8 relative bg-stone-100 overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#5d3a3a_1px,transparent_1px)] [background-size:24px_24px]"></div>
    <div class="max-w-5xl mx-auto bg-[#5d3a3a] rounded-[3.5rem] p-12 md:p-20 text-center text-white relative overflow-hidden shadow-2xl">
        <!-- Ambient atmospheric lights -->
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-stone-100/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10">
            <span class="text-stone-300 text-xs font-semibold tracking-[0.25em] uppercase mb-4 block">Take Action Today</span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6" style="font-family: 'Playfair Display', serif;">Ready to Experience Kwéla?</h2>
            <p class="text-stone-200 text-lg mb-10 max-w-xl mx-auto leading-relaxed">
                Skip the lines. Reservasikan sesi kecantikan pilihan Anda secara instan melalui sistem booking prioritas kami sekarang.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('booking.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-[#5d3a3a] px-10 py-5 rounded-full font-bold hover:bg-stone-100 transition-all shadow-xl hover:scale-105 active:scale-95 duration-300">
                    Book Your Appointment
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection