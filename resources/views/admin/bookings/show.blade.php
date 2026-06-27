@extends('admin.layouts.app')

@section('title', 'Detail Reservasi - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Booking Details</h1>
        <p class="text-zinc-500 text-sm mt-1">Tinjau informasi pelanggan, preferensi layanan pilihan, dan perbarui status pengerjaan.</p>
    </div>
    
    <a href="{{ route('admin.bookings.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-zinc-700 border border-zinc-200 hover:bg-zinc-50 px-4 py-2 rounded-md font-medium text-sm transition-colors shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m19 12-7-7-7 7"/><path d="M5 12h14"/></svg>
        Kembali ke Daftar
    </a>
</div>

<!-- Details Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    
    <!-- Customer Information Card -->
    <div class="bg-white rounded-lg border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3.5 mb-6 pb-3 border-b border-zinc-100">
                <div class="w-8 h-8 bg-zinc-50 text-zinc-600 rounded-md border border-zinc-200 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h2 class="text-base font-semibold text-zinc-900">Informasi Pelanggan</h2>
            </div>
            
            <dl class="space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-zinc-100/60 pb-3">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">Nama</dt>
                    <dd class="text-zinc-900 font-semibold text-sm">{{ $booking->customer_name }}</dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-zinc-100/60 pb-3">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">Email</dt>
                    <dd class="text-zinc-600 font-medium text-sm flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        {{ $booking->email }}
                    </dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center pb-1">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">WhatsApp</dt>
                    <dd class="text-zinc-900 font-semibold text-sm flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-6 15h9" />
                        </svg>
                        {{ $booking->phone }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Booking Visit Details Card -->
    <div class="bg-white rounded-lg border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3.5 mb-6 pb-3 border-b border-zinc-100">
                <div class="w-8 h-8 bg-zinc-50 text-zinc-600 rounded-md border border-zinc-200 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <h2 class="text-base font-semibold text-zinc-900">Rincian Kunjungan</h2>
            </div>
            
            <dl class="space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-zinc-100/60 pb-3">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">Tanggal</dt>
                    <dd class="text-zinc-900 font-semibold text-sm flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                            <line x1="16" x2="16" y1="2" y2="6" />
                            <line x1="8" x2="8" y1="2" y2="6" />
                            <line x1="3" x2="21" y1="10" y2="10" />
                        </svg>
                        {{ $booking->booking_date->format('d M Y') }}
                    </dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-zinc-100/60 pb-3">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">Waktu</dt>
                    <dd class="text-zinc-900 font-semibold text-sm flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        Jam {{ $booking->booking_time }}
                    </dd>
                </div>
                
                @if(($booking->discount_amount ?? 0) > 0)
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-zinc-100/60 pb-3">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">Harga Awal</dt>
                    <dd class="text-zinc-700 font-medium text-sm">{{ $booking->formatted_original_price }}</dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-zinc-100/60 pb-3">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">Diskon</dt>
                    <dd class="text-emerald-700 font-bold text-sm bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded flex items-center gap-1.5">
                        -{{ $booking->formatted_discount }} <span class="text-[10px] font-mono font-medium text-emerald-600 bg-emerald-100/80 px-1 rounded">Kode: {{ $booking->voucher_code }}</span>
                    </dd>
                </div>
                @endif

                <div class="flex flex-col sm:flex-row sm:items-center border-b border-zinc-100/60 pb-3">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">Total Harga</dt>
                    <dd class="text-zinc-950 font-bold text-sm bg-zinc-100 border border-zinc-200 px-2.5 py-0.5 rounded">
                        {{ $booking->formatted_total }}
                    </dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center pb-1">
                    <dt class="w-full sm:w-28 text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1 sm:mb-0">Status</dt>
                    <dd>
                        @if($booking->status === 'pending')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 text-xs font-medium rounded-full bg-amber-50 text-amber-800 border border-amber-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            Menunggu
                        </span>
                        @elseif($booking->status === 'confirmed')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 text-xs font-medium rounded-full bg-blue-50 text-blue-800 border border-blue-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                            Dikonfirmasi
                        </span>
                        @elseif($booking->status === 'completed')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 text-xs font-medium rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Selesai
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 text-xs font-medium rounded-full bg-zinc-100 text-zinc-800 border border-zinc-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-zinc-400"></span>
                            Batal
                        </span>
                        @endif
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Chosen Services Card -->
    <div class="bg-white rounded-lg border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
        <div class="w-full">
            <div class="flex items-center gap-3.5 mb-6 pb-3 border-b border-zinc-100">
                <div class="w-8 h-8 bg-zinc-50 text-zinc-600 rounded-md border border-zinc-200 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <h2 class="text-base font-semibold text-zinc-900">Layanan Terpilih</h2>
            </div>
            
            <ul class="divide-y divide-zinc-100">
                @foreach($booking->services as $service)
                <li class="flex justify-between items-center py-3">
                    <div class="flex items-center gap-2.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-zinc-900"></span>
                        <span class="text-zinc-900 font-semibold text-sm">{{ $service->name }}</span>
                    </div>
                    <span class="text-zinc-500 font-medium text-xs bg-zinc-50 px-2 py-0.5 border border-zinc-200 rounded">{{ $service->formatted_price }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Special Notes Card -->
    <div class="bg-white rounded-lg border border-zinc-200 p-6 shadow-sm flex flex-col justify-between">
        <div class="h-full flex flex-col">
            <div class="flex items-center gap-3.5 mb-6 pb-3 border-b border-zinc-100">
                <div class="w-8 h-8 bg-zinc-50 text-zinc-600 rounded-md border border-zinc-200 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                </div>
                <h2 class="text-base font-semibold text-zinc-900">Catatan Khusus Pelanggan</h2>
            </div>
            
            <div class="bg-zinc-50 border border-zinc-200 p-4 rounded-md flex-grow flex items-center">
                @if($booking->notes)
                <p class="text-zinc-600 text-sm leading-relaxed font-medium italic">
                    "{{ $booking->notes }}"
                </p>
                @else
                <p class="text-zinc-400 text-xs italic font-medium">
                    Tidak ada catatan khusus atau permintaan tambahan yang disampaikan pelanggan untuk sesi ini.
                </p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Update Status Card -->
<div class="bg-white rounded-lg border border-zinc-200 p-6 shadow-sm">
    <div class="mb-5">
        <h2 class="text-base font-semibold text-zinc-900">Perbarui Status Reservasi</h2>
        <p class="text-zinc-500 text-xs mt-0.5">Ubah progres janji temu ini untuk menyelaraskan jadwal terapis dan ketersediaan kuota slot harian.</p>
    </div>
    
    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
        @csrf
        @method('PATCH')
        
        <div class="relative flex-grow sm:max-w-xs">
            <select name="status" id="status" 
                class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 bg-white transition-all text-xs font-bold cursor-pointer appearance-none">
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Konfirmasi Slot Jadwal</option>
                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Selesai / Sesi Sukses</option>
                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan / Absen</option>
            </select>
            <!-- Dropdown Arrow -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-zinc-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        
        <button type="submit" class="inline-flex items-center justify-center gap-1.5 bg-zinc-900 text-zinc-50 px-4 py-2 rounded-md font-medium hover:bg-zinc-800 transition-colors shadow text-xs tracking-wider">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/></svg>
            Perbarui Status
        </button>
    </form>
</div>
@endsection