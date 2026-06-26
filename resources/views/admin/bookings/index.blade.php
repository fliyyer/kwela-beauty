@extends('admin.layouts.app')

@section('title', 'Daftar Reservasi - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
    <div>
        <span class="text-xs font-bold uppercase tracking-widest text-[#5d3a3a]">Manajemen Operasional</span>
        <h1 class="text-3xl md:text-4xl font-bold text-stone-900 tracking-tight mt-1 serif-font" style="font-family: 'Playfair Display', serif;">Daftar Reservasi</h1>
        <p class="text-stone-500 text-sm mt-0.5">Kelola jadwal kunjungan, persetujuan slot perawatan, dan riwayat kunjungan pelanggan Anda.</p>
    </div>
</div>

<!-- STREAMING_CHUNK: Membuat bagian filter status reservasi... -->
<!-- Bar Filter Status -->
<div class="bg-white rounded-[2rem] border border-stone-200/60 shadow-sm p-6 mb-8 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-2xl pointer-events-none"></div>
    
    <form action="{{ route('admin.bookings.index') }}" method="GET" class="flex flex-col sm:flex-row sm:items-center gap-4 relative z-10">
        <label for="status" class="text-xs font-bold uppercase tracking-wider text-stone-500 whitespace-nowrap">Saring Berdasarkan Status:</label>
        <div class="relative w-full sm:w-64">
            <select name="status" id="status" onchange="this.form.submit()" 
                class="w-full px-5 py-3.5 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50 focus:bg-white transition-all text-stone-800 font-bold cursor-pointer appearance-none">
                <option value="all" {{ request('status') == 'all' || !request('status') ? 'selected' : '' }}>Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Slot Dikonfirmasi</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Sesi Selesai</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan / Absen</option>
            </select>
            <!-- Custom Down Arrow Icon -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-5 pointer-events-none text-stone-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
    </form>
</div>

<!-- STREAMING_CHUNK: Menyusun wadah tabel reservasi utama... -->
<!-- Tabel Data Reservasi -->
<div class="bg-white rounded-[2.5rem] border border-stone-200/60 shadow-sm overflow-hidden mb-10">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-stone-50/80 border-b border-stone-100">
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider">Pelanggan</th>
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider">Tanggal & Waktu</th>
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider">Layanan Pilihan</th>
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider">Status</th>
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @forelse($bookings as $booking)
                <tr class="hover:bg-stone-50/30 transition-colors duration-200 group">
                    <!-- Detail Pelanggan -->
                    <td class="px-8 py-5.5">
                        <div class="flex flex-col">
                            <span class="font-bold text-stone-900 group-hover:text-[#5d3a3a] transition-colors duration-200 text-base">{{ $booking->customer_name }}</span>
                            <span class="text-xs text-stone-400 mt-1 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-stone-300" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                {{ $booking->email }}
                            </span>
                            <span class="text-xs text-stone-400 mt-0.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-stone-300" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-6 15h9" />
                                </svg>
                                {{ $booking->phone }}
                            </span>
                        </div>
                    </td>
                    
                    <!-- Tanggal & Waktu Kunjungan -->
                    <td class="px-8 py-5.5">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-stone-800 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-stone-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                    <line x1="16" x2="16" y1="2" y2="6" />
                                    <line x1="8" x2="8" y1="2" y2="6" />
                                    <line x1="3" x2="21" y1="10" y2="10" />
                                </svg>
                                {{ $booking->booking_date->format('d M Y') }}
                            </span>
                            <span class="text-xs text-stone-400 mt-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-stone-300" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                                Jam {{ $booking->booking_time }}
                            </span>
                        </div>
                    </td>
                    
                    <!-- STREAMING_CHUNK: Merender koleksi layanan yang dipilih... -->
                    <!-- Layanan Pilihan -->
                    <td class="px-8 py-5.5">
                        <div class="flex flex-wrap gap-1.5 max-w-xs">
                            @foreach($booking->services as $service)
                            <span class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider bg-stone-100/70 border border-stone-200/40 text-stone-600 px-2.5 py-1 rounded-xl">
                                {{ $service->name }}
                            </span>
                            @endforeach
                        </div>
                    </td>
                    
                    <!-- Badge Status Reservasi -->
                    <td class="px-8 py-5.5">
                        @if($booking->status === 'pending')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full bg-amber-50 text-amber-800 border border-amber-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            Menunggu
                        </span>
                        @elseif($booking->status === 'confirmed')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full bg-blue-50 text-blue-800 border border-blue-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                            Dikonfirmasi
                        </span>
                        @elseif($booking->status === 'completed')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full bg-emerald-50 text-emerald-800 border border-emerald-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Selesai
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full bg-rose-50 text-rose-800 border border-rose-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                            Dibatalkan
                        </span>
                        @endif
                    </td>
                    
                    <!-- Tombol Aksi Kunjungan -->
                    <td class="px-8 py-5.5 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <!-- Detail Button -->
                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-stone-600 hover:text-stone-900 bg-stone-100/80 hover:bg-stone-200/60 px-3.5 py-2 rounded-xl transition-all duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Detail
                            </a>
                            
                            <!-- Delete Trigger (Tanpa confirm native browser) -->
                            <button type="button" 
                                    onclick="triggerDeleteModal('{{ route('admin.bookings.destroy', $booking->id) }}', '{{ $booking->customer_name }}')"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-rose-600 hover:text-white hover:bg-rose-600 bg-rose-50/50 px-3.5 py-2 rounded-xl transition-all duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <!-- Tampilan Jika Data Kosong -->
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="w-16 h-16 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-stone-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.008 1.24l.885 1.77a2.25 2.25 0 0 0 2.007 1.24h1.98a2.25 2.25 0 0 0 2.007-1.24l.885-1.77a2.25 2.25 0 0 1 2.007-1.24h3.86m-18 0h18" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-stone-800 text-lg">Tidak Ada Reservasi ditemukan</h3>
                            <p class="text-stone-400 text-xs mt-1.5 max-w-sm mx-auto">Tidak ada riwayat reservasi pelanggan dengan status penyaringan terpilih saat ini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- STREAMING_CHUNK: Menyediakan modal konfirmasi hapus kustom aman... -->
<!-- Custom Modal Konfirmasi Hapus Kustom (Pengganti Alert/Confirm Default) -->
<div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <!-- Overlay Gelap -->
    <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-sm transition-opacity duration-300" onclick="closeDeleteModal()"></div>
    
    <!-- Box Konten Modal -->
    <div class="relative bg-white rounded-[2.5rem] w-full max-w-md p-8 shadow-2xl border border-stone-100 m-4 z-10 transform scale-95 opacity-0 transition-all duration-300" id="modal-box">
        <div class="text-center">
            <!-- Ikon Warning -->
            <div class="w-16 h-16 bg-rose-50 border border-rose-100 text-rose-500 rounded-3xl flex items-center justify-center mx-auto mb-5">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
            </div>
            
            <h3 class="text-xl font-bold text-stone-900 mb-2">Hapus Reservasi?</h3>
            <p class="text-stone-500 text-sm leading-relaxed mb-6">
                Apakah Anda yakin ingin menghapus reservasi atas nama <span id="target-customer-name" class="font-bold text-stone-800"></span>? Tindakan ini tidak dapat dibatalkan.
            </p>
            
            <!-- Tombol Aksi Modal -->
            <div class="flex items-center gap-3">
                <button type="button" 
                        onclick="closeDeleteModal()" 
                        class="flex-1 py-3 px-5 border border-stone-200 text-stone-600 rounded-full font-semibold text-sm hover:bg-stone-50 transition-colors">
                    Kembali
                </button>
                
                <form id="delete-form" action="" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full py-3 px-5 bg-rose-600 hover:bg-rose-700 text-white rounded-full font-semibold text-sm transition-colors shadow-lg shadow-rose-600/15">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- STREAMING_CHUNK: Mengaktifkan fungsionalitas javascript untuk modal... -->
<script>
    function triggerDeleteModal(actionUrl, customerName) {
        const modal = document.getElementById('delete-modal');
        const modalBox = document.getElementById('modal-box');
        const deleteForm = document.getElementById('delete-form');
        const targetNameSpan = document.getElementById('target-customer-name');
        
        // Atur action form dan nama target pelanggan
        deleteForm.action = actionUrl;
        targetNameSpan.textContent = customerName;
        
        // Tampilkan modal dengan transisi mulus
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
    }
    
    function closeDeleteModal() {
        const modal = document.getElementById('delete-modal');
        const modalBox = document.getElementById('modal-box');
        
        // Sembunyikan modal dengan efek memudar
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>
@endsection