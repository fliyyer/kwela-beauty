@extends('layouts.app')

@section('title', 'Special Offers - Kwéla Beauty Studio')

@section('content')
<!-- Header Section with Immersive Editorial Aesthetic -->
<section class="relative py-28 md:py-36 bg-stone-950 text-white overflow-hidden">
    <!-- Background Image with sophisticated dark warm overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/header-hero.png') }}" 
             alt="Kwéla Beauty Studio Header" 
             class="w-full h-full object-cover object-center opacity-30 select-none">
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
                Exclusive Savings
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold leading-[1.1] text-white" style="font-family: 'Playfair Display', serif;">
                Our Signature <br>
                <span class="text-stone-300 italic font-light">Ritual Promotions</span>
            </h1>
            
            <p class="text-stone-300 text-base md:text-lg max-w-2xl leading-relaxed font-light">
                Manjakan diri Anda dengan rangkaian paket eksklusif dan ritual kecantikan musiman yang dirancang secara personal di <strong class="font-medium text-white">Kwéla Beauty Studio</strong>. Dapatkan penawaran terbatas khusus untuk keanggunan sejati Anda.
            </p>
        </div>

        <!-- Glassmorphic Accent Box (Right Side) -->
        <div class="lg:col-span-4 hidden lg:block">
            <div class="border border-white/10 bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] space-y-4 shadow-2xl relative">
                <!-- Highlight Ribbon -->
                <span class="text-[10px] font-bold tracking-[0.2em] text-amber-400 uppercase block">Weekly Delight</span>
                <h3 class="text-xl font-bold text-white leading-snug">Priority Slot Privileges</h3>
                <p class="text-stone-300 text-xs leading-relaxed font-light">
                    Dapatkan complimentary botanical hair mist premium atau post-treatment organic serum untuk setiap klaim promo di minggu ini.
                </p>
                <div class="absolute -top-4 -right-4 w-12 h-12 bg-[#5d3a3a] rounded-2xl flex items-center justify-center shadow-lg border border-white/10">
                    ✨
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Promotions Content Section -->
<section class="py-24 bg-stone-50">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @forelse($promotions as $promo)
            <!-- Interactive Modern Card -->
            <div class="group bg-white rounded-[2.5rem] shadow-sm border border-stone-100 overflow-hidden flex flex-col md:flex-row h-full hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                
                <!-- Image Container with Intelligent Failback -->
                <div class="w-full md:w-5/12 h-64 md:h-auto min-h-[250px] bg-stone-200 relative overflow-hidden flex-shrink-0">
                    @if($promo->image)
                    <img src="{{ asset('storage/' . $promo->image) }}" 
                         alt="{{ $promo->title }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000 ease-out"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    @endif
                    
                    <!-- Fallback Placeholder with luxury pattern if image doesn't load/exist -->
                    <div class="absolute inset-0 bg-gradient-to-br from-[#5d3a3a]/10 to-[#5d3a3a]/30 flex flex-col items-center justify-center text-center p-6 {{ $promo->image ? 'hidden' : 'flex' }}">
                        <svg class="w-12 h-12 text-[#5d3a3a]/40 mb-3" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 21m0 0l-.813-5.096M9 21h7.5M11.543 8.165A5.982 5.982 0 0010 12c0 .822.165 1.605.461 2.32M19.5 8.25c0-1.657-1.343-3-3-3a3 3 0 00-3 3c0 1.657 1.343 3 3 3a3 3 0 003-3zM13.5 18.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-xs uppercase tracking-widest text-[#5d3a3a]/60 font-semibold">Kwéla Rituals</span>
                    </div>

                    <!-- Luxury Glassmorphism Discount Badge -->
                    <div class="absolute top-6 left-6 backdrop-blur-md bg-[#5d3a3a]/90 text-white px-5 py-2.5 rounded-2xl font-bold shadow-lg flex items-center gap-1">
                        <span class="text-xl tracking-tight">{{ $promo->discount }}%</span>
                        <span class="text-[10px] uppercase tracking-widest opacity-80">Off</span>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="p-8 flex flex-col justify-between flex-grow">
                    <div>
                        <!-- Category Tag / Little Luxury Detail -->
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#5d3a3a]"></span>
                            <span class="text-[10px] uppercase tracking-widest text-stone-400 font-bold">Limited Promotion</span>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-stone-900 group-hover:text-[#5d3a3a] transition-colors duration-300 mb-3 leading-snug">
                            {{ $promo->title }}
                        </h3>
                        
                        <p class="text-stone-600 text-sm leading-relaxed mb-6">
                            {{ $promo->description }}
                        </p>
                    </div>

                    <div>
                        @if($promo->start_date || $promo->end_date)
                        <div class="flex items-center gap-2 text-stone-400 mb-6 bg-stone-50 border border-stone-100 px-4 py-2 rounded-xl w-fit">
                            <svg class="w-4 h-4 text-[#5d3a3a]/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                            <span class="text-xs font-semibold tracking-wider uppercase text-stone-500">
                                {{ $promo->start_date ? $promo->start_date->format('M d') : 'Now' }} - {{ $promo->end_date ? $promo->end_date->format('M d, Y') : 'Indefinite' }}
                            </span>
                        </div>
                        @endif
                        
                        <a href="{{ route('booking.create') }}" class="inline-flex items-center justify-center gap-2 w-full text-center bg-[#5d3a3a] hover:bg-stone-900 text-white py-4 rounded-2xl font-semibold shadow-md hover:shadow-xl transition-all duration-300">
                            <span>Claim This Offer</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <!-- Elegant Empty State -->
            <div class="col-span-full text-center py-24 bg-white rounded-[3rem] border border-stone-100 shadow-sm max-w-2xl mx-auto px-8">
                <div class="w-24 h-24 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-stone-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 21m0 0l-.813-5.096M9 21h7.5M11.543 8.165A5.982 5.982 0 0010 12c0 .822.165 1.605.461 2.32M19.5 8.25c0-1.657-1.343-3-3-3a3 3 0 00-3 3c0 1.657 1.343 3 3 3a3 3 0 003-3zM13.5 18.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-[#5d3a3a] mb-2" style="font-family: 'Playfair Display', serif;">No Active Offers Right Now</h3>
                <p class="text-stone-500 text-sm max-w-md mx-auto leading-relaxed">
                    We are currently preparing our next signature seasonal ritual promotions. Stay tuned or consult with our beauticians directly.
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

<!-- Ultra-Premium Call to Action Section -->
<section class="py-24 px-8 relative bg-stone-100 overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#5d3a3a_1px,transparent_1px)] [background-size:24px_24px]"></div>
    <div class="max-w-5xl mx-auto bg-[#5d3a3a] rounded-[3.5rem] p-12 md:p-20 text-center text-white relative overflow-hidden shadow-2xl">
        <!-- Ambient atmospheric lights -->
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-stone-100/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10">
            <span class="text-stone-300 text-xs font-semibold tracking-[0.25em] uppercase mb-4 block">Never Miss a Glow Up</span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6" style="font-family: 'Playfair Display', serif;">Want First-Class Updates?</h2>
            <p class="text-stone-200 text-lg mb-10 max-w-xl mx-auto leading-relaxed">
                Connect with us on social channels or contact our studio desk to be instantly notified about priority booking slots and pop-up events.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-[#5d3a3a] px-10 py-5 rounded-full font-bold hover:bg-stone-100 transition-all shadow-xl hover:scale-105 active:scale-95 duration-300">
                    Get in Touch
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection