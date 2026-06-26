@extends('layouts.app')

@section('title', 'Contact Us - Kwéla Beauty Studio')

@section('content')
<!-- Header Section with Immersive Editorial Aesthetic (Matching Promotions & Services) -->
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
                Get in Touch
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold leading-[1.1] text-white" style="font-family: 'Playfair Display', serif;">
                Contact Our <br>
                <span class="text-stone-300 italic font-light">Beauty Sanctuary</span>
            </h1>
            
            <p class="text-stone-300 text-base md:text-lg max-w-2xl leading-relaxed font-light">
                Kami siap mendengarkan kebutuhan kecantikan personal Anda. Silakan hubungi kami untuk pertanyaan, konsultasi gaya, atau reservasi perawatan eksklusif di <strong class="font-medium text-white">Kwéla Beauty Studio</strong>.
            </p>
        </div>

        <!-- Glassmorphic Accent Box (Right Side) -->
        <div class="lg:col-span-4 hidden lg:block">
            <div class="border border-white/10 bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] space-y-4 shadow-2xl relative">
                <!-- Highlight Ribbon -->
                <span class="text-[10px] font-bold tracking-[0.2em] text-amber-400 uppercase block">Concierge Desk</span>
                <h3 class="text-xl font-bold text-white leading-snug">Direct Consult</h3>
                <p class="text-stone-300 text-xs leading-relaxed font-light">
                    Tim kami siap menjawab seluruh pertanyaan Anda seputar rekomendasi ritual perawatan yang paling sesuai untuk Anda.
                </p>
                <div class="absolute -top-4 -right-4 w-12 h-12 bg-[#5d3a3a] rounded-2xl flex items-center justify-center shadow-lg border border-white/10">
                    ✨
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="py-20 bg-stone-50">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Side: Contacts & Studio Hours (5 Cols) -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <h2 class="text-3xl font-bold text-[#5d3a3a] mb-2" style="font-family: 'Playfair Display', serif;">Reach Our Studio</h2>
                    <p class="text-stone-500 text-sm">We typically respond within 1-2 hours during operational hours.</p>
                </div>
                
                <!-- Contact Information Cards -->
                <div class="space-y-4">
                    <!-- WhatsApp Card -->
                    <div class="group bg-white p-6 rounded-[2rem] shadow-sm border border-stone-100 flex items-center gap-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center flex-shrink-0 overflow-hidden group-hover:bg-[#5d3a3a]/10 transition-colors duration-300">
                            <!-- Fallback ke image local, jika tidak ada memakai SVG minimalis -->
                            <img src="{{ asset('images/wa.png') }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'" alt="WhatsApp" class="w-7 h-7 object-contain">
                            <svg class="w-7 h-7 text-[#5d3a3a] hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-6 15h9" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase tracking-widest text-stone-400 font-bold">WhatsApp Chat</h4>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" class="text-stone-900 font-bold text-lg hover:text-[#5d3a3a] transition-colors block mt-0.5">
                                {{ $whatsapp }}
                            </a>
                        </div>
                    </div>

                    <!-- Instagram Card -->
                    <div class="group bg-white p-6 rounded-[2rem] shadow-sm border border-stone-100 flex items-center gap-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center flex-shrink-0 overflow-hidden group-hover:bg-[#5d3a3a]/10 transition-colors duration-300">
                            <img src="{{ asset('images/instagram.png') }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'" alt="Instagram" class="w-7 h-7 object-contain">
                            <svg class="w-7 h-7 text-[#5d3a3a] hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase tracking-widest text-stone-400 font-bold">Instagram Feed</h4>
                            <a href="https://instagram.com/{{ str_replace('@', '', $instagram) }}" target="_blank" class="text-stone-900 font-bold text-lg hover:text-[#5d3a3a] transition-colors block mt-0.5">
                                {{ $instagram }}
                            </a>
                        </div>
                    </div>
                    
                    <!-- Address Card -->
                    <div class="group bg-white p-6 rounded-[2rem] shadow-sm border border-stone-100 flex items-center gap-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center flex-shrink-0 overflow-hidden group-hover:bg-[#5d3a3a]/10 transition-colors duration-300">
                            <img src="{{ asset('images/map.png') }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'" alt="Map" class="w-7 h-7 object-contain">
                            <svg class="w-7 h-7 text-[#5d3a3a] hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase tracking-widest text-stone-400 font-bold">Studio Location</h4>
                            <p class="text-stone-800 font-medium text-sm leading-relaxed mt-0.5">{{ $address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Studio Hours Card -->
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-stone-100">
                    <h3 class="text-xl font-bold text-[#5d3a3a] mb-6 flex items-center gap-2" style="font-family: 'Playfair Display', serif;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                        </svg>
                        Studio Hours
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-sm border-b border-stone-100 pb-2">
                            <span class="text-stone-500 font-medium">Monday - Friday</span>
                            <span class="text-stone-900 font-semibold">09:00 AM - 07:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center text-sm border-b border-stone-100 pb-2">
                            <span class="text-stone-500 font-medium">Saturday</span>
                            <span class="text-stone-900 font-semibold">09:00 AM - 06:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-stone-500 font-medium">Sunday</span>
                            <span class="text-[#5d3a3a] font-bold">By Appointment Only</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Maps & Direct Policies (7 Cols) -->
            <div class="lg:col-span-7 flex flex-col justify-between space-y-8">
                <div>
                    <h2 class="text-3xl font-bold text-[#5d3a3a] mb-2" style="font-family: 'Playfair Display', serif;">Find Us On The Map</h2>
                    <p class="text-stone-500 text-sm">Easily accessible with spacious private parking on-site.</p>
                </div>

                <!-- Map Frame -->
                <div class="bg-white p-4 rounded-[2.5rem] shadow-md border border-stone-100 flex-grow relative group overflow-hidden">
                    <div class="rounded-[1.8rem] overflow-hidden h-full min-h-[350px] relative">
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
                <div class="bg-stone-100 rounded-3xl p-6 flex flex-col md:flex-row items-start gap-4 border border-stone-200">
                    <div class="bg-[#5d3a3a]/10 text-[#5d3a3a] p-3 rounded-2xl flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-stone-900 text-sm">Planning Your Visit?</h4>
                        <p class="text-stone-600 text-xs leading-relaxed mt-1">
                            We advise booking 2 days in advance. Please arrive 10 minutes prior to your slot to complete check-in and customize your treatment.
                        </p>
                    </div>
                </div>

                <!-- Google Maps Link Button -->
                <div class="text-center lg:text-left">
                    <a href="{{ $mapsLink }}" target="_blank" class="inline-flex items-center gap-2 bg-stone-900 text-white px-8 py-4 rounded-full hover:bg-stone-700 transition duration-300 font-semibold shadow-lg">
                        Open in Google Maps
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 px-8 relative bg-stone-100 overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#5d3a3a_1px,transparent_1px)] [background-size:24px_24px]"></div>
    <div class="max-w-5xl mx-auto bg-[#5d3a3a] rounded-[3.5rem] p-12 md:p-20 text-center text-white relative overflow-hidden shadow-2xl">
        <!-- Ambient light circles -->
        <div class="absolute -top-32 -right-32 w-80 h-80 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-stone-100/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10">
            <span class="text-stone-300 text-xs font-semibold tracking-widest uppercase mb-4 block">Pamper Yourself Today</span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6" style="font-family: 'Playfair Display', serif;">Ready to Experience Kwéla?</h2>
            <p class="text-stone-200 text-lg mb-10 max-w-xl mx-auto leading-relaxed">
                Skip the queue. Lock down your expert eyelash, haircut, or lash lift session today with our secure booking page.
            </p>
            <a href="{{ route('booking.create') }}" class="inline-flex items-center gap-2 bg-white text-[#5d3a3a] px-10 py-5 rounded-full font-bold hover:bg-stone-100 transition-all shadow-xl hover:scale-105 active:scale-95 duration-300">
                Book Your Appointment Now
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection