<footer class="bg-kwela-maroon text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Brand -->
            <div>
                <h3 class="text-2xl font-bold mb-4">Kwéla Beauty Studio</h3>
                <p class="text-kwela-beige text-sm">
                    Your destination for beauty and self-care. Experience premium beauty services with our expert team.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-kwela-beige hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('services.index') }}" class="text-kwela-beige hover:text-white transition-colors">Services</a></li>
                    <li><a href="{{ route('promotions.index') }}" class="text-kwela-beige hover:text-white transition-colors">Promotions</a></li>
                    <li><a href="{{ route('booking.create') }}" class="text-kwela-beige hover:text-white transition-colors">Book Now</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-2 text-kwela-beige">
                    <li class="flex items-center">
                        <span class="mr-2">📍</span>
                        {{ \App\Models\Setting::getValue('address', 'Kwela Beauty Studio') }}
                    </li>
                    <li class="flex items-center">
                        <span class="mr-2">📱</span>
                        {{ \App\Models\Setting::getValue('whatsapp', '085126485450') }}
                    </li>
                    <li class="flex items-center">
                        <span class="mr-2">📸</span>
                        {{ \App\Models\Setting::getValue('instagram', '@kwela_beautystudio') }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-kwela-brown mt-8 pt-8 text-center text-kwela-beige text-sm">
            <p>&copy; {{ date('Y') }} Kwéla Beauty Studio. All rights reserved.</p>
        </div>
    </div>
</footer>
