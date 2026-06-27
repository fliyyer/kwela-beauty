<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Kwéla Studio - Admin Entry</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-zinc-50/50 text-zinc-950 min-h-screen antialiased flex items-center justify-center py-12 px-6">
        <div class="w-full max-w-[400px]">
            <div class="bg-white rounded-lg shadow-sm border border-zinc-200 p-6 md:p-8">
                <!-- Branding Header -->
                <div class="text-center mb-6">
                    <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight text-kwela-maroon">
                        Kwéla <span class="font-normal text-zinc-500">Beauty Studio</span>
                    </a>
                    <p class="text-zinc-450 text-[11px] mt-1.5 font-medium">Sistem Manajemen Content</p>
                </div>
                
                {{ $slot }}
            </div>
            
            <!-- Minimal Copyright footer -->
            <p class="text-center text-[10px] text-zinc-400 mt-6 font-medium">
                &copy; {{ date('Y') }} Kwéla Beauty Studio. All rights reserved.
            </p>
        </div>
    </body>
</html>
