@extends('layouts.app')

@section('title', 'Contact Us - Kwéla Beauty Studio')

@section('content')
<!-- Header Section with Immersive Editorial Aesthetic -->
<section class="relative py-20 md:py-24 bg-zinc-950 text-white overflow-hidden border-b border-zinc-900">
    <!-- Background Image with sophisticated dark warm overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/header-hero.png') }}" 
             alt="Kwéla Beauty Studio Header" 
             class="w-full h-full object-cover object-center opacity-25 select-none">
        <!-- Cinematic dark gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-zinc-950 via-zinc-950/95 to-zinc-900/40"></div>
        <!-- Glow highlights -->
        <div class="absolute top-1/4 -left-24 w-96 h-96 bg-zinc-800/20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute -bottom-24 right-1/4 w-[500px] h-[500px] bg-zinc-900/30 rounded-full blur-[100px] pointer-events-none"></div>
    </div>

    <!-- Content Layout -->
    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Editorial Headline -->
        <div class="lg:col-span-8 space-y-6 text-left">
            <div class="inline-flex items-center gap-2 bg-zinc-900 border border-zinc-800 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-[0.25em] text-zinc-300">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Get in Touch
            </div>
            
            <h1 class="text-5xl md:text-6xl font-extrabold leading-[1.1] text-white tracking-tight">
                Contact Our <br>
                <span class="text-zinc-400 italic font-light">Beauty Sanctuary</span>
            </h1>
            
            <p class="text-zinc-450 text-sm md:text-base max-w-2xl leading-relaxed font-light">
                Kami siap mendengarkan kebutuhan kecantikan personal Anda. Silakan hubungi kami untuk pertanyaan, konsultasi gaya, atau reservasi perawatan eksklusif di <strong class="font-medium text-white">Kwéla Beauty Studio</strong>.
            </p>
        </div>

        <!-- Glassmorphic Accent Box (Right Side) -->
        <div class="lg:col-span-4 hidden lg:block">
            <div class="border border-zinc-800 bg-zinc-900/60 backdrop-blur-md p-6 rounded-lg space-y-3 shadow-2xl relative">
                <!-- Highlight Ribbon -->
                <span class="text-[9px] font-bold tracking-[0.2em] text-zinc-400 uppercase block">Concierge Desk</span>
                <h3 class="text-lg font-bold text-white leading-snug">Direct Consult</h3>
                <p class="text-zinc-400 text-xs leading-relaxed font-light">
                    Tim kami siap menjawab seluruh pertanyaan Anda seputar rekomendasi ritual perawatan yang paling sesuai untuk Anda.
                </p>
                <div class="absolute -top-3 -right-3 w-10 h-10 bg-zinc-900 border border-zinc-800 rounded-lg flex items-center justify-center shadow-lg">
                    ✨
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="py-20 bg-zinc-50/50">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Side: Contacts & Studio Hours (5 Cols) -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <h2 class="text-2xl font-extrabold text-zinc-900 tracking-tight mb-1.5">Reach Our Studio</h2>
                    <p class="text-zinc-500 text-xs">We typically respond within 1-2 hours during operational hours.</p>
                </div>
                
                <!-- Contact Information Cards -->
                <div class="space-y-4">
                    <!-- WhatsApp Card -->
                    <div class="group bg-white p-5 rounded-lg shadow-sm border border-zinc-200 flex items-center gap-6 hover:border-zinc-350 transition-colors duration-200">
                        <div class="w-12 h-12 bg-zinc-55 border border-zinc-150 rounded-md flex items-center justify-center flex-shrink-0 overflow-hidden group-hover:bg-kwela-maroon group-hover:text-white transition-colors duration-200">
                            <!-- Fallback ke image local, jika tidak ada memakai SVG minimalis -->
                            <img src="{{ asset('images/wa.png') }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'" alt="WhatsApp" class="w-6 h-6 object-contain filter group-hover:invert group-hover:brightness-0 transition-all duration-200">
                            <svg class="w-6 h-6 text-zinc-900 hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-6 15h9" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-[9px] uppercase tracking-widest text-zinc-400 font-bold">WhatsApp Chat</h4>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" class="text-zinc-900 font-bold text-base hover:text-zinc-950 transition-colors block mt-0.5">
                                {{ $whatsapp }}
                            </a>
                        </div>
                    </div>

                    <!-- Instagram Card -->
                    <div class="group bg-white p-5 rounded-lg shadow-sm border border-zinc-200 flex items-center gap-6 hover:border-zinc-350 transition-colors duration-200">
                        <div class="w-12 h-12 bg-zinc-55 border border-zinc-150 rounded-md flex items-center justify-center flex-shrink-0 overflow-hidden group-hover:bg-kwela-maroon group-hover:text-white transition-colors duration-200">
                            <img src="{{ asset('images/instagram.png') }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'" alt="Instagram" class="w-6 h-6 object-contain filter group-hover:invert group-hover:brightness-0 transition-all duration-200">
                            <svg class="w-6 h-6 text-zinc-900 hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-[9px] uppercase tracking-widest text-zinc-400 font-bold">Instagram Feed</h4>
                            <a href="https://instagram.com/{{ str_replace('@', '', $instagram) }}" target="_blank" class="text-zinc-900 font-bold text-base hover:text-zinc-950 transition-colors block mt-0.5">
                                {{ $instagram }}
                            </a>
                        </div>
                    </div>
                    
                    <!-- Address Card -->
                    <div class="group bg-white p-5 rounded-lg shadow-sm border border-zinc-200 flex items-center gap-6 hover:border-zinc-350 transition-colors duration-200">
                        <div class="w-12 h-12 bg-zinc-55 border border-zinc-150 rounded-md flex items-center justify-center flex-shrink-0 overflow-hidden group-hover:bg-kwela-maroon group-hover:text-white transition-colors duration-200">
                            <img src="{{ asset('images/map.png') }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'" alt="Map" class="w-6 h-6 object-contain filter group-hover:invert group-hover:brightness-0 transition-all duration-200">
                            <svg class="w-6 h-6 text-zinc-900 hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-[9px] uppercase tracking-widest text-zinc-400 font-bold">Studio Location</h4>
                            <p class="text-zinc-800 font-medium text-xs leading-relaxed mt-0.5">{{ $address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Studio Hours Card -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-zinc-200">
                    <h3 class="text-base font-bold text-zinc-900 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-zinc-650" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                        </svg>
                        Studio Hours
                    </h3>
                    <div class="space-y-2.5">
                        <div class="flex justify-between items-center text-xs border-b border-zinc-100 pb-2">
                            <span class="text-zinc-500 font-medium">Monday - Friday</span>
                            <span class="text-zinc-900 font-semibold">09:00 AM - 07:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center text-xs border-b border-zinc-100 pb-2">
                            <span class="text-zinc-500 font-medium">Saturday</span>
                            <span class="text-zinc-900 font-semibold">09:00 AM - 06:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-zinc-500 font-medium">Sunday</span>
                            <span class="text-kwela-maroon font-bold">By Appointment Only</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Maps & Direct Policies (7 Cols) -->
            <div class="lg:col-span-7 flex flex-col justify-between space-y-6">
                <div>
                    <h2 class="text-2xl font-extrabold text-zinc-900 tracking-tight mb-1.5">Find Us On The Map</h2>
                    <p class="text-zinc-500 text-xs">Easily accessible with spacious private parking on-site.</p>
                </div>

                <!-- Map Frame -->
                <div class="bg-white p-3 rounded-lg shadow-sm border border-zinc-200 flex-grow relative group overflow-hidden">
                    <div class="rounded-md overflow-hidden h-full min-h-[350px] relative border border-zinc-100">
                        <iframe 
                            src="{{ $mapsLink }}" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="absolute inset-0 w-full h-full">
                        </iframe>
                    </div>
                </div>

                <!-- Info & Studio Policies Box -->
                <div class="bg-zinc-50 rounded-lg p-5 flex flex-col md:flex-row items-start gap-4 border border-zinc-200">
                    <div class="bg-kwela-maroon text-white p-2.5 rounded-md flex-shrink-0 border border-kwela-maroon/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-zinc-900 text-xs">Planning Your Visit?</h4>
                        <p class="text-zinc-500 text-[11px] leading-relaxed mt-1">
                            We advise booking 2 days in advance. Please arrive 10 minutes prior to your slot to complete check-in and customize your treatment.
                        </p>
                    </div>
                </div>

                <!-- Google Maps Link Button -->
                <div class="text-center lg:text-left">
                    <a href="{{ $mapsLink }}" target="_blank" class="inline-flex items-center gap-2 bg-kwela-maroon hover:bg-kwela-maroon/90 text-white px-6 py-2.5 rounded-md font-semibold shadow-sm transition-colors text-xs uppercase tracking-wider">
                        Open in Google Maps
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-8 relative bg-zinc-100/50 overflow-hidden border-t border-zinc-200/60">
    <div class="max-w-5xl mx-auto bg-kwela-maroon border border-kwela-maroon/20 rounded-2xl p-12 text-center text-white relative overflow-hidden shadow-xl">
        <!-- Ambient light circles -->
        <div class="absolute -top-32 -right-32 w-80 h-80 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-zinc-950/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10">
            <span class="text-zinc-400 text-xs font-semibold tracking-widest uppercase mb-3 block">Pamper Yourself Today</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Experience Kwéla?</h2>
            <p class="text-zinc-400 text-sm mb-8 max-w-xl mx-auto leading-relaxed">
                Skip the queue. Lock down your eyelash, haircut, or lash lift session today with our secure booking page.
            </p>
            <a href="{{ route('booking.create') }}" class="inline-flex items-center gap-2 bg-white text-kwela-maroon px-8 py-3.5 rounded-md font-bold hover:bg-zinc-100 transition-all shadow hover:scale-[1.01] active:scale-[0.99] duration-205 text-xs uppercase tracking-wider">
                Book Your Appointment Now
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection