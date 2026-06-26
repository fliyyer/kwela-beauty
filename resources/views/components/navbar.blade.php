<nav class="flex items-center justify-between py-6 px-6 md:px-8 max-w-7xl mx-auto w-full">
    <!-- Logo -->
    <div class="text-2xl font-bold tracking-tight text-stone-900 whitespace-nowrap">
        <a href="{{ route('home') }}">Kwéla <span class="font-light">Beauty Studio</span></a>
    </div>

    <!-- Desktop Navigation -->
    <!-- Menambahkan flex-grow agar link berada di tengah secara rapi jika diperlukan, atau justify-end -->
    <div class="hidden md:flex items-center space-x-8 font-medium text-stone-600">
        <a href="{{ route('home') }}" class="hover:text-stone-900 transition {{ request()->routeIs('home') ? 'text-stone-900 font-semibold' : '' }}">
            Home
        </a>
        <a href="{{ route('services.index') }}" class="hover:text-stone-900 transition {{ request()->routeIs('services.index') ? 'text-stone-900 font-semibold' : '' }}">
            Services
        </a>
        <a href="{{ route('promotions.index') }}" class="hover:text-stone-900 transition {{ request()->routeIs('promotions.index') ? 'text-stone-900 font-semibold' : '' }}">
            Promotions
        </a>
        <a href="{{ route('contact') }}" class="hover:text-stone-900 transition {{ request()->routeIs('contact') ? 'text-stone-900 font-semibold' : '' }}">
            Contact
        </a>
    </div>

    <!-- Book Now Button (Desktop) -->
    <div class="hidden md:block">
        <a href="{{ route('booking.create') }}" class="bg-stone-900 text-white px-6 py-2 rounded-full hover:bg-stone-700 transition">
            Book Now
        </a>
    </div>

    <!-- Mobile menu button -->
    <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="text-stone-700 hover:text-stone-900 p-2">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</nav>

<!-- Mobile menu -->
<div id="mobile-menu" class="hidden md:hidden w-full bg-stone-50 border-b border-stone-200">
    <div class="px-6 py-4 space-y-4">
        <a href="{{ route('home') }}" class="block text-stone-700 hover:text-stone-900 {{ request()->routeIs('home') ? 'text-stone-900 font-semibold' : '' }}">
            Home
        </a>
        <a href="{{ route('services.index') }}" class="block text-stone-700 hover:text-stone-900 {{ request()->routeIs('services.index') ? 'text-stone-900 font-semibold' : '' }}">
            Services
        </a>
        <a href="{{ route('promotions.index') }}" class="block text-stone-700 hover:text-stone-900 {{ request()->routeIs('promotions.index') ? 'text-stone-900 font-semibold' : '' }}">
            Promotions
        </a>
        <a href="{{ route('contact') }}" class="block text-stone-700 hover:text-stone-900 {{ request()->routeIs('contact') ? 'text-stone-900 font-semibold' : '' }}">
            Contact
        </a>
        <a href="{{ route('booking.create') }}" class="block w-full bg-stone-900 text-white py-3 rounded-full text-center hover:bg-stone-700">
            Book Now
        </a>
    </div>
</div>

<script>
    // Pastikan script ini dipanggil setelah elemen dimuat
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        
        if (btn && menu) {
            btn.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });
        }
    });
</script>