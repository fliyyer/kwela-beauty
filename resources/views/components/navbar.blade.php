<nav class="bg-white shadow-sm border-b border-kwela-brown">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-kwela-maroon">Kwéla</span>
                    <span class="text-2xl font-light text-kwela-dark ml-1">Beauty Studio</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-kwela-dark hover:text-kwela-maroon transition-colors {{ request()->routeIs('home') ? 'text-kwela-maroon font-semibold' : '' }}">
                    Home
                </a>
                <a href="{{ route('services.index') }}" class="text-kwela-dark hover:text-kwela-maroon transition-colors {{ request()->routeIs('services.index') ? 'text-kwela-maroon font-semibold' : '' }}">
                    Services
                </a>
                <a href="{{ route('promotions.index') }}" class="text-kwela-dark hover:text-kwela-maroon transition-colors {{ request()->routeIs('promotions.index') ? 'text-kwela-maroon font-semibold' : '' }}">
                    Promotions
                </a>
                <a href="{{ route('contact') }}" class="text-kwela-dark hover:text-kwela-maroon transition-colors {{ request()->routeIs('contact') ? 'text-kwela-maroon font-semibold' : '' }}">
                    Contact
                </a>
                <a href="{{ route('booking.create') }}" class="bg-kwela-maroon text-white px-4 py-2 rounded-md hover:bg-opacity-90 transition-colors">
                    Book Now
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-kwela-dark hover:text-kwela-maroon">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-b border-kwela-brown">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-kwela-dark hover:text-kwela-maroon {{ request()->routeIs('home') ? 'text-kwela-maroon font-semibold' : '' }}">
                Home
            </a>
            <a href="{{ route('services.index') }}" class="block px-3 py-2 text-kwela-dark hover:text-kwela-maroon {{ request()->routeIs('services.index') ? 'text-kwela-maroon font-semibold' : '' }}">
                Services
            </a>
            <a href="{{ route('promotions.index') }}" class="block px-3 py-2 text-kwela-dark hover:text-kwela-maroon {{ request()->routeIs('promotions.index') ? 'text-kwela-maroon font-semibold' : '' }}">
                Promotions
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 text-kwela-dark hover:text-kwela-maroon {{ request()->routeIs('contact') ? 'text-kwela-maroon font-semibold' : '' }}">
                Contact
            </a>
            <a href="{{ route('booking.create') }}" class="block px-3 py-2 mt-2 bg-kwela-maroon text-white rounded-md text-center hover:bg-opacity-90">
                Book Now
            </a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
