@extends('admin.layouts.app')

@section('title', 'Dashboard - Kwéla Beauty Admin')

@section('content')
<div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <p class="text-3xl md:text-4xl font-bold text-stone-900 serif-font">Analisis Dasbor</p>
        <p class="text-stone-500 text-sm mt-0.5">Selamat datang kembali! Berikut adalah perkembangan di Kwéla Beauty Studio hari ini.</p>
    </div>
    
    <!-- Indikator Status Sistem Langsung -->
    <div class="flex items-center gap-2.5 bg-emerald-50 border border-emerald-100/80 px-4 py-2 rounded-2xl w-fit self-start sm:self-auto shadow-sm">
        <span class="relative flex h-2.5 w-2.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
        </span>
        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-800">Sistem Aktif</span>
    </div>
</div>

<!-- Grid Kartu Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <!-- Total Reservasi -->
    <div class="bg-white rounded-[2rem] border border-stone-200/50 p-6 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-[#5d3a3a]/5 rounded-bl-[4rem] group-hover:scale-110 transition-transform duration-500"></div>
        <div class="flex items-center justify-between relative z-10">
            <div>
                <span class="text-stone-400 text-xs font-bold uppercase tracking-wider block mb-1">Total Reservasi</span>
                <span class="text-4xl font-extrabold text-[#5d3a3a] tracking-tight leading-none block">{{ $totalBookings }}</span>
                <span class="text-[10px] text-stone-400 font-medium block mt-2">Semua catatan reservasi</span>
            </div>
            <div class="w-12 h-12 bg-[#5d3a3a]/10 text-[#5d3a3a] rounded-2xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            </div>
        </div>
    </div>

    <!-- Reservasi Hari Ini -->
    <div class="bg-white rounded-[2rem] border border-stone-200/50 p-6 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/5 rounded-bl-[4rem] group-hover:scale-110 transition-transform duration-500"></div>
        <div class="flex items-center justify-between relative z-10">
            <div>
                <span class="text-stone-400 text-xs font-bold uppercase tracking-wider block mb-1">Reservasi Hari Ini</span>
                <span class="text-4xl font-extrabold text-stone-900 tracking-tight leading-none block">{{ $todayBookings }}</span>
                <span class="text-[10px] text-emerald-600 font-semibold block mt-2">✨ Perlu tindakan hari ini</span>
            </div>
            <div class="w-12 h-12 bg-emerald-500/10 text-emerald-600 rounded-2xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>
            </div>
        </div>
    </div>

    <!-- Layanan Aktif -->
    <div class="bg-white rounded-[2rem] border border-stone-200/50 p-6 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/5 rounded-bl-[4rem] group-hover:scale-110 transition-transform duration-500"></div>
        <div class="flex items-center justify-between relative z-10">
            <div>
                <span class="text-stone-400 text-xs font-bold uppercase tracking-wider block mb-1">Layanan Aktif</span>
                <span class="text-4xl font-extrabold text-stone-900 tracking-tight leading-none block">{{ $activeServices }}<span class="text-lg text-stone-400 font-light">/{{ $totalServices }}</span></span>
                <span class="text-[10px] text-stone-400 font-medium block mt-2">Katalog perawatan aktif online</span>
            </div>
            <div class="w-12 h-12 bg-amber-500/10 text-amber-600 rounded-2xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"/><path d="M8.12 8.12 12 12"/><path d="M20 4 8.12 15.88"/><circle cx="6" cy="18" r="3"/><path d="M14.8 14.8 20 20"/></svg>
            </div>
        </div>
    </div>

    <!-- Promosi Aktif -->
    <div class="bg-white rounded-[2rem] border border-stone-200/50 p-6 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-violet-500/5 rounded-bl-[4rem] group-hover:scale-110 transition-transform duration-500"></div>
        <div class="flex items-center justify-between relative z-10">
            <div>
                <span class="text-stone-400 text-xs font-bold uppercase tracking-wider block mb-1">Promo Aktif</span>
                <span class="text-4xl font-extrabold text-stone-900 tracking-tight leading-none block">{{ $activePromotions }}<span class="text-lg text-stone-400 font-light">/{{ $totalPromotions }}</span></span>
                <span class="text-[10px] text-stone-400 font-medium block mt-2">Kampanye musiman aktif</span>
            </div>
            <div class="w-12 h-12 bg-violet-500/10 text-violet-600 rounded-2xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
            </div>
        </div>
    </div>
</div>

<!-- Bagian Alur Reservasi -->
<div class="mb-10">
    <span class="text-xs font-bold uppercase tracking-widest text-[#5d3a3a] block mb-4">Alur Reservasi</span>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Status Menunggu -->
        <div class="bg-white rounded-2xl border border-stone-200/50 p-5 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between group">
            <div class="flex items-center gap-4">
                <div class="w-3 h-10 rounded-full bg-amber-400"></div>
                <div>
                    <span class="text-stone-400 text-[10px] font-bold uppercase tracking-wider block">Menunggu Persetujuan</span>
                    <span class="text-2xl font-extrabold text-stone-900 leading-none mt-1 block">{{ $pendingBookings }}</span>
                </div>
            </div>
            <span class="text-amber-500 bg-amber-50 text-[10px] font-bold px-2.5 py-1 rounded-lg">Antrean</span>
        </div>

        <!-- Status Dikonfirmasi -->
        <div class="bg-white rounded-2xl border border-stone-200/50 p-5 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between group">
            <div class="flex items-center gap-4">
                <div class="w-3 h-10 rounded-full bg-blue-500"></div>
                <div>
                    <span class="text-stone-400 text-[10px] font-bold uppercase tracking-wider block">Slot Dikonfirmasi</span>
                    <span class="text-2xl font-extrabold text-stone-900 leading-none mt-1 block">{{ $confirmedBookings }}</span>
                </div>
            </div>
            <span class="text-blue-600 bg-blue-50 text-[10px] font-bold px-2.5 py-1 rounded-lg">Aman</span>
        </div>

        <!-- Status Selesai -->
        <div class="bg-white rounded-2xl border border-stone-200/50 p-5 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between group">
            <div class="flex items-center gap-4">
                <div class="w-3 h-10 rounded-full bg-emerald-500"></div>
                <div>
                    <span class="text-stone-400 text-[10px] font-bold uppercase tracking-wider block">Sesi Selesai</span>
                    <span class="text-2xl font-extrabold text-stone-900 leading-none mt-1 block">{{ $completedBookings }}</span>
                </div>
            </div>
            <span class="text-emerald-600 bg-emerald-50 text-[10px] font-bold px-2.5 py-1 rounded-lg">Selesai</span>
        </div>

        <!-- Status Dibatalkan -->
        <div class="bg-white rounded-2xl border border-stone-200/50 p-5 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between group">
            <div class="flex items-center gap-4">
                <div class="w-3 h-10 rounded-full bg-rose-400"></div>
                <div>
                    <span class="text-stone-400 text-[10px] font-bold uppercase tracking-wider block">Dibatalkan / Absen</span>
                    <span class="text-2xl font-extrabold text-stone-900 leading-none mt-1 block">{{ $cancelledBookings }}</span>
                </div>
            </div>
            <span class="text-rose-500 bg-rose-50 text-[10px] font-bold px-2.5 py-1 rounded-lg">Tutup</span>
        </div>
    </div>
</div>
@endsection