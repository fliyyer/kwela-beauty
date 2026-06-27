@extends('admin.layouts.app')

@section('title', 'Detail Reservasi - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
    <div>
        <span class="text-xs font-bold uppercase tracking-widest text-[#5d3a3a]">Manajemen Kunjungan</span>
        <h1 class="text-3xl md:text-4xl font-bold text-stone-900 tracking-tight mt-1 serif-font" style="font-family: 'Playfair Display', serif;">Detail Reservasi</h1>
        <p class="text-stone-500 text-sm mt-0.5">Tinjau informasi pelanggan, preferensi layanan pilihan, dan perbarui status pengerjaan.</p>
    </div>
    
    <a href="{{ route('admin.bookings.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-stone-600 border border-stone-200 hover:border-stone-300 px-6 py-3.5 rounded-full font-semibold hover:bg-stone-50 transition-all duration-300 shadow-sm hover:shadow active:scale-95 text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Kembali ke Daftar
    </a>
</div>

<!-- Grid Kartu Informasi Utama -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
    
    <!-- Kartu Informasi Pelanggan -->
    <div class="bg-white rounded-[2rem] border border-stone-200/60 p-8 shadow-sm relative overflow-hidden flex flex-col justify-between">
        <!-- Dekorasi Pendaran Estetik Pojok -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-2xl pointer-events-none"></div>
        
        <div class="relative z-10">
            <div class="flex items-center gap-3.5 mb-6 pb-4 border-b border-stone-100">
                <div class="w-10 h-10 bg-[#5d3a3a]/10 text-[#5d3a3a] rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h2 class="text-lg font-bold text-stone-900">Informasi Pelanggan</h2>
            </div>
            
            <dl class="space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-stone-100/50 pb-3">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">Nama</dt>
                    <dd class="text-stone-800 font-semibold text-sm">{{ $booking->customer_name }}</dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-stone-100/50 pb-3">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">Email</dt>
                    <dd class="text-stone-700 font-medium text-sm flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-stone-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        {{ $booking->email }}
                    </dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center pb-1">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">WhatsApp</dt>
                    <dd class="text-stone-800 font-semibold text-sm flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-[#5d3a3a]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-6 15h9" />
                        </svg>
                        {{ $booking->phone }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Kartu Rincian Kunjungan -->
    <div class="bg-white rounded-[2rem] border border-stone-200/60 p-8 shadow-sm relative overflow-hidden flex flex-col justify-between">
        <!-- Dekorasi Pendaran Estetik Pojok -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-2xl pointer-events-none"></div>
        
        <div class="relative z-10">
            <div class="flex items-center gap-3.5 mb-6 pb-4 border-b border-stone-100">
                <div class="w-10 h-10 bg-[#5d3a3a]/10 text-[#5d3a3a] rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <h2 class="text-lg font-bold text-stone-900">Rincian Kunjungan</h2>
            </div>
            
            <dl class="space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-stone-100/50 pb-3">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">Tanggal</dt>
                    <dd class="text-stone-800 font-bold text-sm flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                            <line x1="16" x2="16" y1="2" y2="6" />
                            <line x1="8" x2="8" y1="2" y2="6" />
                            <line x1="3" x2="21" y1="10" y2="10" />
                        </svg>
                        {{ $booking->booking_date->format('d M Y') }}
                    </dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-stone-100/50 pb-3">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">Waktu / Jam</dt>
                    <dd class="text-stone-800 font-semibold text-sm flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        {{ $booking->booking_time }}
                    </dd>
                </div>
                @if(($booking->discount_amount ?? 0) > 0)
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-stone-100/50 pb-3">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">Harga Awal</dt>
                    <dd class="text-stone-700 font-semibold text-sm">{{ $booking->formatted_original_price }}</dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-stone-100/50 pb-3">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">Diskon</dt>
                    <dd class="text-emerald-700 font-bold text-sm bg-emerald-50 border border-emerald-100/40 px-2.5 py-1 rounded-xl w-fit flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        -{{ $booking->formatted_discount }} <span class="text-[10px] font-mono text-emerald-600 bg-emerald-100/80 px-1.5 py-0.5 rounded">Kode: {{ $booking->voucher_code }}</span>
                    </dd>
                </div>
                @endif
                <div class="flex flex-col sm:flex-row sm:items-center border-b border-stone-100/50 pb-3">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">Total Harga</dt>
                    <dd class="text-[#5d3a3a] font-extrabold text-base bg-[#5d3a3a]/5 border border-[#5d3a3a]/10 px-3 py-1 rounded-xl w-fit">
                        {{ $booking->formatted_total }}
                    </dd>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center pb-1">
                    <dt class="w-full sm:w-32 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1 sm:mb-0">Status</dt>
                    <dd>
                        @if($booking->status === 'pending')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-full bg-amber-50 text-amber-800 border border-amber-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            Menunggu
                        </span>
                        @elseif($booking->status === 'confirmed')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-full bg-blue-50 text-blue-800 border border-blue-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                            Dikonfirmasi
                        </span>
                        @elseif($booking->status === 'completed')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-full bg-emerald-50 text-emerald-800 border border-emerald-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Selesai
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-full bg-rose-50 text-rose-800 border border-rose-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                            Dibatalkan
                        </span>
                        @endif
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Kartu Layanan Terpilih -->
    <div class="bg-white rounded-[2rem] border border-stone-200/60 p-8 shadow-sm relative overflow-hidden flex flex-col justify-between">
        <!-- Dekorasi Pendaran Estetik Pojok -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-2xl pointer-events-none"></div>
        
        <div class="relative z-10 w-full">
            <div class="flex items-center gap-3.5 mb-6 pb-4 border-b border-stone-100">
                <div class="w-10 h-10 bg-[#5d3a3a]/10 text-[#5d3a3a] rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <h2 class="text-lg font-bold text-stone-900">Layanan Terpilih</h2>
            </div>
            
            <ul class="divide-y divide-stone-100">
                @foreach($booking->services as $service)
                <li class="flex justify-between items-center py-3.5 group">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-[#5d3a3a]"></span>
                        <span class="text-stone-800 font-bold text-sm group-hover:text-[#5d3a3a] transition-colors">{{ $service->name }}</span>
                    </div>
                    <span class="text-stone-500 font-semibold text-sm bg-stone-50 px-2.5 py-1 rounded-xl border border-stone-100">{{ $service->formatted_price }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Kartu Catatan Tambahan -->
    <div class="bg-white rounded-[2rem] border border-stone-200/60 p-8 shadow-sm relative overflow-hidden flex flex-col justify-between">
        <!-- Dekorasi Pendaran Estetik Pojok -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-2xl pointer-events-none"></div>
        
        <div class="relative z-10 h-full flex flex-col">
            <div class="flex items-center gap-3.5 mb-6 pb-4 border-b border-stone-100">
                <div class="w-10 h-10 bg-[#5d3a3a]/10 text-[#5d3a3a] rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                </div>
                <h2 class="text-lg font-bold text-stone-900">Catatan Khusus Pelanggan</h2>
            </div>
            
            <div class="bg-stone-50/60 border border-stone-100 p-5 rounded-2xl flex-grow flex items-center">
                @if($booking->notes)
                <p class="text-stone-600 text-sm leading-relaxed font-medium italic">
                    "{{ $booking->notes }}"
                </p>
                @else
                <p class="text-stone-400 text-sm italic font-medium">
                    Tidak ada catatan khusus atau permintaan tambahan yang disampaikan pelanggan untuk sesi ini.
                </p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Bagian Pembaruan Status -->
<div class="bg-white rounded-[2.5rem] border border-stone-200/60 p-8 md:p-10 shadow-sm relative overflow-hidden">
    <div class="absolute bottom-0 right-0 w-48 h-48 bg-gradient-to-tr from-[#5d3a3a]/5 to-transparent rounded-full blur-2xl pointer-events-none"></div>

    <div class="relative z-10">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-stone-900">Perbarui Status Reservasi</h2>
            <p class="text-stone-400 text-xs mt-1">Ubah progres janji temu ini untuk menyelaraskan jadwal terapis dan ketersediaan kuota slot harian.</p>
        </div>
        
        <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
            @csrf
            @method('PATCH')
            
            <div class="relative flex-grow sm:max-w-xs">
                <select name="status" id="status" 
                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-bold cursor-pointer appearance-none">
                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Konfirmasi Slot Jadwal</option>
                    <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Selesai / Sesi Sukses</option>
                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan / Absen</option>
                </select>
              
            </div>
            
            <button type="submit" class="inline-flex items-center justify-center gap-2 bg-[#5d3a3a] text-white px-8 py-4 rounded-full font-bold hover:bg-stone-900 transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 text-sm tracking-wide">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/></svg>
                Perbarui Progres Status
            </button>
        </form>
    </div>
</div>
@endsection