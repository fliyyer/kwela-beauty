<header class="border-b border-zinc-200 bg-white backdrop-blur-md sticky top-0 z-50 w-full">
    <nav class="flex items-center justify-between py-5 px-6 md:px-8 max-w-7xl mx-auto w-full">
        <!-- Logo -->
        <div class="text-xl font-bold tracking-tight text-kwela-maroon whitespace-nowrap">
            <a href="{{ route('home') }}">Kwéla <span class="font-normal text-zinc-500">Beauty Studio</span></a>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8 font-medium text-zinc-600 text-sm">
            <a href="{{ route('home') }}" class="hover:text-zinc-950 transition-colors {{ request()->routeIs('home') ? 'text-zinc-950 font-semibold' : '' }}">
                Home
            </a>
            <a href="{{ route('services.index') }}" class="hover:text-zinc-950 transition-colors {{ request()->routeIs('services.index') ? 'text-zinc-950 font-semibold' : '' }}">
                Services
            </a>
            <a href="{{ route('promotions.index') }}" class="hover:text-zinc-950 transition-colors {{ request()->routeIs('promotions.index') ? 'text-zinc-950 font-semibold' : '' }}">
                Promotions
            </a>
            <a href="{{ route('contact') }}" class="hover:text-zinc-950 transition-colors {{ request()->routeIs('contact') ? 'text-zinc-950 font-semibold' : '' }}">
                Contact
            </a>
        </div>

        <!-- Book Now Button (Desktop) -->
        <div class="hidden md:block">
            <a href="{{ route('booking.create') }}" class="bg-kwela-maroon text-white hover:bg-kwela-maroon/90 px-4 py-2 rounded-md font-medium text-xs shadow-sm transition-colors">
                Book Now
            </a>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden flex items-center">
            <button id="mobile-menu-button" class="text-zinc-700 hover:text-zinc-950 p-2">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden w-full bg-white border-t border-zinc-200">
        <div class="px-6 py-4 space-y-4 text-sm font-medium">
            <a href="{{ route('home') }}" class="block text-zinc-600 hover:text-zinc-950 {{ request()->routeIs('home') ? 'text-zinc-950 font-semibold' : '' }}">
                Home
            </a>
            <a href="{{ route('services.index') }}" class="block text-zinc-600 hover:text-zinc-950 {{ request()->routeIs('services.index') ? 'text-zinc-950 font-semibold' : '' }}">
                Services
            </a>
            <a href="{{ route('promotions.index') }}" class="block text-zinc-600 hover:text-zinc-950 {{ request()->routeIs('promotions.index') ? 'text-zinc-950 font-semibold' : '' }}">
                Promotions
            </a>
            <a href="{{ route('contact') }}" class="block text-zinc-600 hover:text-zinc-950 {{ request()->routeIs('contact') ? 'text-zinc-950 font-semibold' : '' }}">
                Contact
            </a>
            <a href="{{ route('booking.create') }}" class="block w-full bg-kwela-maroon text-white py-2.5 rounded-md text-center hover:bg-kwela-maroon/90 text-xs font-semibold uppercase tracking-wider shadow">
                Book Now
            </a>
        </div>
    </div>
</header>

<script>
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