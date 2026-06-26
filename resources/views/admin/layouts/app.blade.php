<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Kwéla Beauty Studio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-kwela-maroon text-white flex-shrink-0">
            <div class="p-6">
                <h1 class="text-xl font-bold">Kwéla Admin</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 border-l-4 border-white' : '' }}">
                    <span class="mr-3">📊</span>
                    Dashboard
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.services.*') ? 'bg-white/10 border-l-4 border-white' : '' }}">
                    <span class="mr-3">💅</span>
                    Services
                </a>
                <a href="{{ route('admin.promotions.index') }}" class="flex items-center px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.promotions.*') ? 'bg-white/10 border-l-4 border-white' : '' }}">
                    <span class="mr-3">🎉</span>
                    Promotions
                </a>
                <a href="{{ route('admin.bookings.index') }}" class="flex items-center px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.bookings.*') ? 'bg-white/10 border-l-4 border-white' : '' }}">
                    <span class="mr-3">📅</span>
                    Bookings
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center px-6 py-3 hover:bg-white/10 {{ request()->routeIs('admin.settings.*') ? 'bg-white/10 border-l-4 border-white' : '' }}">
                    <span class="mr-3">⚙️</span>
                    Settings
                </a>
            </nav>
            <div class="mt-auto p-6 border-t border-white/10">
                <a href="{{ route('home') }}" class="flex items-center px-6 py-3 hover:bg-white/10 mb-2">
                    <span class="mr-3">🏠</span>
                    View Website
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center px-6 py-3 hover:bg-white/10 w-full text-left">
                        <span class="mr-3">🚪</span>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif
            
            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
