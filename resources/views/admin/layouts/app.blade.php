<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Kwéla Beauty Studio')</title>
    <!-- Google Fonts for Editorial aesthetic -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .serif-font { font-family: 'Playfair Display', serif; }
        .sidebar-bg { background-color: #1a1010; }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 antialiased selection:bg-[#5d3a3a] selection:text-white">
    <div class="min-h-screen flex">
        
        <!-- Sidebar Navigation -->
        <aside class="w-72 sidebar-bg text-stone-300 flex-shrink-0 flex flex-col justify-between border-r border-stone-800/40 relative z-30">
            <!-- Warm ambient glow inside sidebar top -->
            <div class="absolute top-0 left-0 w-32 h-32 bg-[#5d3a3a]/10 rounded-full blur-[60px] pointer-events-none"></div>
            
            <div class="relative z-10 flex flex-col h-full">
                <!-- Brand Header -->
                <div class="px-8 py-7 border-b border-stone-800/40">
                    <h1 class="text-xl font-bold tracking-tight text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        Kwéla <span class="font-light text-stone-400">Admin</span>
                    </h1>
                </div>

                <!-- Navigation Links -->
                <nav class="mt-8 px-4 space-y-1.5 flex-grow">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-sm font-medium tracking-wide group {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-[#5d3a3a] to-[#7a4d4d] text-white shadow-lg shadow-[#5d3a3a]/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3 transition-transform group-hover:scale-105"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                        Dashboard
                    </a>

                    <!-- Services -->
                    <a href="{{ route('admin.services.index') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-sm font-medium tracking-wide group {{ request()->routeIs('admin.services.*') ? 'bg-gradient-to-r from-[#5d3a3a] to-[#7a4d4d] text-white shadow-lg shadow-[#5d3a3a]/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3 transition-transform group-hover:scale-105"><circle cx="6" cy="6" r="3"/><path d="M8.12 8.12 12 12"/><path d="M20 4 8.12 15.88"/><circle cx="6" cy="18" r="3"/><path d="M14.8 14.8 20 20"/></svg>
                        Services
                    </a>

                    <!-- Promotions -->
                    <a href="{{ route('admin.promotions.index') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-sm font-medium tracking-wide group {{ request()->routeIs('admin.promotions.*') ? 'bg-gradient-to-r from-[#5d3a3a] to-[#7a4d4d] text-white shadow-lg shadow-[#5d3a3a]/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3 transition-transform group-hover:scale-105"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
                        Promotions
                    </a>

                    <!-- Vouchers -->
                    <a href="{{ route('admin.vouchers.index') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-sm font-medium tracking-wide group {{ request()->routeIs('admin.vouchers.*') ? 'bg-gradient-to-r from-[#5d3a3a] to-[#7a4d4d] text-white shadow-lg shadow-[#5d3a3a]/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3 transition-transform group-hover:scale-105"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M13 5v14"/><path d="M9 9h.01"/><path d="M9 15h.01"/></svg>
                        Vouchers
                    </a>

                    <!-- Bookings -->
                    <a href="{{ route('admin.bookings.index') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-sm font-medium tracking-wide group {{ request()->routeIs('admin.bookings.*') ? 'bg-gradient-to-r from-[#5d3a3a] to-[#7a4d4d] text-white shadow-lg shadow-[#5d3a3a]/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3 transition-transform group-hover:scale-105"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        Bookings
                    </a>

                    <!-- Settings -->
                    <a href="{{ route('admin.settings.index') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-sm font-medium tracking-wide group {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-[#5d3a3a] to-[#7a4d4d] text-white shadow-lg shadow-[#5d3a3a]/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3 transition-transform group-hover:scale-105"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                        Settings
                    </a>
                </nav>

                <!-- Sidebar Footer Options -->
                <div class="p-4 border-t border-stone-800/40 space-y-1">
                    <!-- Back to Main Site -->
                    <a href="{{ route('home') }}" 
                       class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium hover:bg-white/5 hover:text-white transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                        View Website
                    </a>

                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="flex items-center w-full px-4 py-2.5 rounded-xl text-sm font-medium hover:bg-red-500/10 hover:text-red-400 transition-all duration-300 text-stone-400 text-left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Workspace Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            
            <!-- Top Dashboard Header Bar -->
            <header class="bg-white border-b border-stone-200/80 px-8 py-4 flex items-center justify-between sticky top-0 z-20">
                <div class="flex flex-col">
                    <span class="text-xs font-semibold uppercase tracking-widest text-stone-400">Control Panel</span>
                    <h2 class="text-sm font-bold text-stone-800 flex items-center gap-1.5 mt-0.5">
                        Welcome Back, Admin
                        <span class="text-xs bg-[#5d3a3a]/10 text-[#5d3a3a] px-2 py-0.5 rounded-md font-medium">Kwéla Studio</span>
                    </h2>
                </div>
                
                <div class="flex items-center gap-6">
                    <!-- Current Date (Dynamic Look) -->
                    <div class="hidden sm:flex items-center gap-2 text-xs text-stone-500 bg-stone-50 border border-stone-200 px-3 py-1.5 rounded-xl">
                        <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                            <line x1="16" x2="16" y1="2" y2="6"></line>
                            <line x1="8" x2="8" y1="2" y2="6"></line>
                            <line x1="3" x2="21" y1="10" y2="10"></line>
                        </svg>
                        <span>{{ date('F d, Y') }}</span>
                    </div>

                    <!-- Profile Avatar Placeholder -->
                    <div class="flex items-center gap-3 border-l border-stone-200 pl-6">
                        <div class="w-9 h-9 bg-[#5d3a3a] text-white font-bold text-sm rounded-full flex items-center justify-center shadow-md">
                            K
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Grid -->
            <main class="flex-1 p-8 relative">
                
                <!-- Elegant Toast Alerts -->
                @if(session('success'))
                <div class="mb-6 flex items-center gap-3 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-2xl shadow-sm animate-fade-in">
                    <div class="bg-emerald-500/10 text-emerald-500 p-1.5 rounded-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-emerald-900">Success Action Completed</p>
                        <p class="text-xs text-emerald-700/95 mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
                @endif
                
                @if(session('error'))
                <div class="mb-6 flex items-center gap-3 bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-2xl shadow-sm animate-fade-in">
                    <div class="bg-rose-500/10 text-rose-500 p-1.5 rounded-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-rose-900">Error Occurred</p>
                        <p class="text-xs text-rose-700/95 mt-0.5">{{ session('error') }}</p>
                    </div>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>