@extends('admin.layouts.app')

@section('title', 'Dashboard - Kwéla Beauty Admin')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Dashboard</h1>
        <p class="text-zinc-500 text-sm mt-1">Selamat datang kembali! Berikut adalah perkembangan di Kwéla Beauty Studio hari ini.</p>
    </div>
    
    <!-- System Status Badge -->
    <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 px-3.5 py-1.5 rounded-full w-fit self-start sm:self-auto shadow-sm">
        <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
        </span>
        <span class="text-[10px] font-semibold uppercase tracking-wider text-emerald-800">Sistem Aktif</span>
    </div>
</div>

<!-- Dashboard Date Filter Form -->
<form method="GET" action="{{ route('admin.dashboard') }}" class="flex flex-wrap items-end gap-3 bg-white border border-zinc-200 p-4 rounded-lg shadow-sm mb-8">
    <div class="flex flex-col gap-1.5">
        <label for="date" class="text-xs font-semibold text-zinc-650">Filter Tanggal</label>
        <input type="date" id="date" name="date" value="{{ $date }}"
            class="text-xs border border-zinc-200 rounded-md px-3 py-1.5 focus:outline-none focus:ring-1 focus:ring-zinc-950 bg-white text-zinc-950 w-44">
    </div>

    <div class="flex items-center gap-2">
        <button type="submit" 
            class="inline-flex items-center justify-center gap-1.5 bg-zinc-900 hover:bg-zinc-800 text-zinc-50 px-4 py-1.5 rounded-md font-semibold text-xs shadow-sm transition-colors cursor-pointer h-[32px]">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
            Filter
        </button>
        
        @if($date)
            <a href="{{ route('admin.dashboard') }}" 
                class="inline-flex items-center justify-center px-3 py-1.5 border border-zinc-200 bg-white hover:bg-zinc-50 text-zinc-700 rounded-md text-xs font-semibold transition-colors h-[32px]">
                Reset
            </a>
        @endif
    </div>
</form>

<!-- Stats Card Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Bookings -->
    <div class="bg-white rounded-xl border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-start justify-between">
            <div>
                <span class="text-zinc-500 text-xs font-medium uppercase tracking-wider block mb-1">Total Reservasi</span>
                <span class="text-3xl font-bold text-zinc-900 tracking-tight leading-none">{{ $totalBookings }}</span>
            </div>
            <div class="w-10 h-10 bg-zinc-50 text-zinc-500 rounded-lg border border-zinc-200 flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            </div>
        </div>
        <div class="text-[11px] text-zinc-400 mt-4 font-medium">Semua catatan reservasi</div>
    </div>

    <!-- Bookings Today -->
    <div class="bg-white rounded-xl border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-start justify-between">
            <div>
                <span class="text-zinc-500 text-xs font-medium uppercase tracking-wider block mb-1">Reservasi Hari Ini</span>
                <span class="text-3xl font-bold text-zinc-900 tracking-tight leading-none">{{ $todayBookings }}</span>
            </div>
            <div class="w-10 h-10 bg-zinc-50 text-zinc-500 rounded-lg border border-zinc-200 flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            </div>
        </div>
        <div class="text-[11px] text-emerald-600 font-semibold mt-4">✨ Perlu tindakan hari ini</div>
    </div>

    <!-- Active Services -->
    <div class="bg-white rounded-xl border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-start justify-between">
            <div>
                <span class="text-zinc-500 text-xs font-medium uppercase tracking-wider block mb-1">Layanan Aktif</span>
                <span class="text-3xl font-bold text-zinc-900 tracking-tight leading-none">{{ $activeServices }}<span class="text-lg text-zinc-400 font-normal">/{{ $totalServices }}</span></span>
            </div>
            <div class="w-10 h-10 bg-zinc-50 text-zinc-500 rounded-lg border border-zinc-200 flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"/><path d="M8.12 8.12 12 12"/><path d="M20 4 8.12 15.88"/><circle cx="6" cy="18" r="3"/><path d="M14.8 14.8 20 20"/></svg>
            </div>
        </div>
        <div class="text-[11px] text-zinc-400 mt-4 font-medium">Katalog perawatan aktif online</div>
    </div>

    <!-- Active Promotions -->
    <div class="bg-white rounded-xl border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-start justify-between">
            <div>
                <span class="text-zinc-500 text-xs font-medium uppercase tracking-wider block mb-1">Promo Aktif</span>
                <span class="text-3xl font-bold text-zinc-900 tracking-tight leading-none">{{ $activePromotions }}<span class="text-lg text-zinc-400 font-normal">/{{ $totalPromotions }}</span></span>
            </div>
            <div class="w-10 h-10 bg-zinc-50 text-zinc-500 rounded-lg border border-zinc-200 flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
            </div>
        </div>
        <div class="text-[11px] text-zinc-400 mt-4 font-medium">Kampanye musiman aktif</div>
    </div>
</div>

<!-- Financial Stats Section -->
<div class="mb-8">
    <h2 class="text-xs font-bold uppercase tracking-wider text-zinc-400 block mb-3.5">Keuangan & Pendapatan</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Revenue Current Month -->
        <div class="bg-white rounded-xl border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-zinc-500 text-xs font-medium uppercase tracking-wider block mb-1">Pendapatan Bulan Ini</span>
                    <span class="text-2xl font-bold text-zinc-900 tracking-tight leading-none">Rp {{ number_format($monthRevenue, 0, ',', '.') }}</span>
                </div>
                <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg border border-emerald-100 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
            </div>
            <div class="text-[11px] text-emerald-600 mt-4 font-semibold flex items-center gap-1">
                <span>Kalender Bulan: {{ now()->translatedFormat('F Y') }}</span>
            </div>
        </div>

        <!-- Revenue Filter Period -->
        <div class="bg-white rounded-xl border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-zinc-500 text-xs font-medium uppercase tracking-wider block mb-1">Pendapatan Periode Filter</span>
                    <span class="text-2xl font-bold text-zinc-900 tracking-tight leading-none">Rp {{ number_format($filteredRevenue, 0, ',', '.') }}</span>
                </div>
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg border border-blue-100 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/><circle cx="18" cy="15" r="1"/></svg>
                </div>
            </div>
            <div class="text-[11px] text-zinc-500 mt-4 font-semibold">
                @if($date)
                    Tanggal: {{ \Carbon\Carbon::parse($date)->format('d M Y') }}
                @else
                    Seluruh Periode (Tanpa Filter)
                @endif
            </div>
        </div>

        <!-- Revenue Total -->
        <div class="bg-white rounded-xl border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-zinc-500 text-xs font-medium uppercase tracking-wider block mb-1">Total Pendapatan (Keseluruhan)</span>
                    <span class="text-2xl font-bold text-zinc-900 tracking-tight leading-none">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</span>
                </div>
                <div class="w-10 h-10 bg-zinc-50 text-zinc-500 rounded-lg border border-zinc-200 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="6" y2="18"/><line x1="10" x2="14" y1="18" y2="18"/><line x1="10" x2="14" y1="6" y2="6"/><path d="M12 18a4 4 0 0 0 0-8c-2 0-2-2-4-2h8"/></svg>
                </div>
            </div>
            <div class="text-[11px] text-zinc-400 mt-4 font-semibold">Akumulasi seluruh transaksi selesai</div>
        </div>
    </div>
</div>

<!-- Booking Status Section -->
<div class="mb-8">
    <h2 class="text-xs font-bold uppercase tracking-wider text-zinc-400 block mb-3.5">Alur Reservasi</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Status Pending -->
        <div class="bg-white rounded-xl border border-zinc-200 p-5 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-8 rounded-full bg-amber-500"></div>
                <div>
                    <span class="text-zinc-500 text-[10px] font-semibold uppercase tracking-wider block">Menunggu</span>
                    <span class="text-xl font-bold text-zinc-900 mt-0.5 block">{{ $pendingBookings }}</span>
                </div>
            </div>
            <span class="text-amber-800 bg-amber-50 border border-amber-100 text-[10px] font-semibold px-2 py-0.5 rounded">Antrean</span>
        </div>

        <!-- Status Confirmed -->
        <div class="bg-white rounded-xl border border-zinc-200 p-5 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-8 rounded-full bg-blue-500"></div>
                <div>
                    <span class="text-zinc-500 text-[10px] font-semibold uppercase tracking-wider block">Dikonfirmasi</span>
                    <span class="text-xl font-bold text-zinc-900 mt-0.5 block">{{ $confirmedBookings }}</span>
                </div>
            </div>
            <span class="text-blue-800 bg-blue-50 border border-blue-100 text-[10px] font-semibold px-2 py-0.5 rounded">Aman</span>
        </div>

        <!-- Status Completed -->
        <div class="bg-white rounded-xl border border-zinc-200 p-5 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-8 rounded-full bg-emerald-500"></div>
                <div>
                    <span class="text-zinc-500 text-[10px] font-semibold uppercase tracking-wider block">Selesai</span>
                    <span class="text-xl font-bold text-zinc-900 mt-0.5 block">{{ $completedBookings }}</span>
                </div>
            </div>
            <span class="text-emerald-800 bg-emerald-50 border border-emerald-100 text-[10px] font-semibold px-2 py-0.5 rounded">Selesai</span>
        </div>

        <!-- Status Cancelled -->
        <div class="bg-white rounded-xl border border-zinc-200 p-5 shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-8 rounded-full bg-zinc-400"></div>
                <div>
                    <span class="text-zinc-500 text-[10px] font-semibold uppercase tracking-wider block">Dibatalkan</span>
                    <span class="text-xl font-bold text-zinc-900 mt-0.5 block">{{ $cancelledBookings }}</span>
                </div>
            </div>
            <span class="text-zinc-750 bg-zinc-100 border border-zinc-200 text-[10px] font-semibold px-2 py-0.5 rounded">Tutup</span>
        </div>
    </div>
</div>
@endsection