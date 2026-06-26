<footer class="bg-stone-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Brand -->
            <div>
                <h3 class="text-2xl font-bold mb-4">Kwéla <span class="font-light">Beauty Studio</span></h3>
                <p class="text-stone-400 text-sm">
                    Your destination for beauty and self-care. Experience premium beauty services with our expert team.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-stone-400 hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('services.index') }}" class="text-stone-400 hover:text-white transition-colors">Services</a></li>
                    <li><a href="{{ route('promotions.index') }}" class="text-stone-400 hover:text-white transition-colors">Promotions</a></li>
                    <li><a href="{{ route('booking.create') }}" class="text-stone-400 hover:text-white transition-colors">Book Now</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('images/map.png') }}" alt="Address" class="w-5 h-5 object-contain">
                        <span class="text-stone-400">{{ \App\Models\Setting::getValue('address', 'Kwela Beauty Studio') }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('images/wa.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::getValue('whatsapp', '085126485450')) }}" class="text-stone-400 hover:text-white transition-colors">
                            {{ \App\Models\Setting::getValue('whatsapp', '085126485450') }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-5 h-5 object-contain">
                        <a href="https://instagram.com/{{ str_replace('@', '', \App\Models\Setting::getValue('instagram', 'kwela_beautystudio')) }}" target="_blank" class="text-stone-400 hover:text-white transition-colors">
                            {{ \App\Models\Setting::getValue('instagram', '@kwela_beautystudio') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-stone-800 mt-8 pt-8 text-center text-stone-500 text-sm">
            <p>&copy; {{ date('Y') }} Kwéla Beauty Studio. All rights reserved.</p>
        </div>
    </div>
</footer>
