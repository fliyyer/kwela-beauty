@extends('admin.layouts.app')

@section('title', 'Daftar Reservasi - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Bookings</h1>
        <p class="text-zinc-500 text-sm mt-1">Kelola jadwal kunjungan, persetujuan slot perawatan, dan riwayat kunjungan pelanggan Anda.</p>
    </div>
</div>

<!-- Filter Bar -->
<div class="bg-white rounded-lg border border-zinc-200 shadow-sm p-4 mb-6">
    <form action="{{ route('admin.bookings.index') }}" method="GET" class="flex flex-col gap-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <!-- Search Input -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-zinc-600">Pencarian</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama, email, atau no HP..." 
                        class="w-full pl-9 pr-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 bg-white transition-all text-xs font-medium placeholder-zinc-400">
                </div>
            </div>

            <!-- Date Filter -->
            <div class="flex flex-col gap-1.5">
                <label for="date" class="text-xs font-semibold text-zinc-600">Filter Tanggal</label>
                <input type="date" id="date" name="date" value="{{ $date }}"
                    class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 bg-white transition-all text-xs font-medium text-zinc-900">
            </div>

            <!-- Status Filter -->
            <div class="flex flex-col gap-1.5">
                <label for="status" class="text-xs font-semibold text-zinc-600">Status</label>
                <div class="relative">
                    <select name="status" id="status" onchange="this.form.submit()" 
                        class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 bg-white transition-all text-xs font-semibold cursor-pointer appearance-none">
                        <option value="all" {{ request('status') == 'all' || !request('status') ? 'selected' : '' }}>Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Slot Dikonfirmasi</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Sesi Selesai</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan / Absen</option>
                    </select>
                    <!-- Down Arrow Icon -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-zinc-400">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-2.5">
            <button type="submit" class="bg-zinc-900 text-zinc-50 hover:bg-zinc-800 transition-colors px-4 py-2 rounded-md text-xs font-semibold shadow cursor-pointer">
                Cari & Filter
            </button>
            
            @if(request('search') || (request('status') && request('status') !== 'all') || $date)
                <a href="{{ route('admin.bookings.index') }}" class="border border-zinc-200 bg-white hover:bg-zinc-100 transition-colors px-4 py-2 rounded-md text-xs font-semibold text-zinc-700 text-center">
                    Reset
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Bookings Table -->
<div class="bg-white rounded-lg border border-zinc-200 shadow-sm overflow-hidden mb-10">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-zinc-50/75 border-b border-zinc-200 text-zinc-500 font-medium text-xs uppercase tracking-wider">
                    <th class="px-6 py-4">Pelanggan</th>
                    <th class="px-6 py-4">Tanggal & Waktu</th>
                    <th class="px-6 py-4">Layanan Pilihan</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200">
                @forelse($bookings as $booking)
                <tr class="hover:bg-zinc-50/50 transition-colors duration-200">
                    <!-- Customer Info -->
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span class="font-semibold text-zinc-900 text-sm">{{ $booking->customer_name }}</span>
                            <span class="text-xs text-zinc-400 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-zinc-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                {{ $booking->email }}
                            </span>
                            <span class="text-xs text-zinc-400 mt-0.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-zinc-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-6 15h9" />
                                </svg>
                                {{ $booking->phone }}
                            </span>
                        </div>
                    </td>
                    
                    <!-- Date & Time -->
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span class="text-xs font-semibold text-zinc-700 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                    <line x1="16" x2="16" y1="2" y2="6" />
                                    <line x1="8" x2="8" y1="2" y2="6" />
                                    <line x1="3" x2="21" y1="10" y2="10" />
                                </svg>
                                {{ $booking->booking_date->format('d M Y') }}
                            </span>
                            <span class="text-xs text-zinc-400 mt-1 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-zinc-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                                Jam {{ $booking->booking_time }}
                            </span>
                        </div>
                    </td>
                    
                    <!-- Services Chosen -->
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1 max-w-xs">
                            @foreach($booking->services as $service)
                            <span class="inline-flex items-center text-[10px] font-semibold bg-zinc-100 border border-zinc-200 text-zinc-750 px-2 py-0.5 rounded">
                                {{ $service->name }}
                            </span>
                            @endforeach
                        </div>
                    </td>
                                        <!-- Status Badge / Custom Alpine Dropdown with SVG Icons -->
                    <td class="px-6 py-4">
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            <!-- Trigger Button -->
                            <button @click="open = !open" type="button" 
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-full border transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-zinc-950 cursor-pointer
                                {{ $booking->status === 'pending' ? 'bg-amber-50 text-amber-800 border-amber-200 hover:bg-amber-100/60' : '' }}
                                {{ $booking->status === 'confirmed' ? 'bg-blue-50 text-blue-800 border-blue-200 hover:bg-blue-100/60' : '' }}
                                {{ $booking->status === 'completed' ? 'bg-emerald-50 text-emerald-800 border-emerald-200 hover:bg-emerald-100/60' : '' }}
                                {{ $booking->status === 'cancelled' ? 'bg-zinc-100 text-zinc-800 border-zinc-200 hover:bg-zinc-150/60' : '' }}">
                                
                                @if($booking->status === 'pending')
                                    <svg class="w-3.5 h-3.5 text-amber-500 animate-pulse" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    <span>Menunggu</span>
                                @elseif($booking->status === 'confirmed')
                                    <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    <span>Dikonfirmasi</span>
                                @elseif($booking->status === 'completed')
                                    <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                    <span>Selesai</span>
                                @else
                                    <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
                                    <span>Batal</span>
                                @endif
                                
                                <svg class="w-3 h-3 ml-0.5 opacity-60" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                            </button>

                            <!-- Dropdown Options List -->
                            <div x-show="open" @click.away="open = false" x-transition 
                                class="origin-top-left absolute left-0 mt-1.5 w-40 rounded-md shadow-md bg-white border border-zinc-200 focus:outline-none z-30" style="display: none;">
                                <div class="py-1">
                                    <!-- Menunggu Option -->
                                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="flex items-center gap-2 w-full text-left px-3.5 py-2 text-xs font-semibold text-zinc-700 hover:bg-zinc-50 hover:text-zinc-900 cursor-pointer">
                                            <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            Menunggu
                                        </button>
                                    </form>

                                    <!-- Dikonfirmasi Option -->
                                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="flex items-center gap-2 w-full text-left px-3.5 py-2 text-xs font-semibold text-zinc-700 hover:bg-zinc-50 hover:text-zinc-900 cursor-pointer">
                                            <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                            Dikonfirmasi
                                        </button>
                                    </form>

                                    <!-- Selesai Option -->
                                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="completed">
                                        <button type="submit" class="flex items-center gap-2 w-full text-left px-3.5 py-2 text-xs font-semibold text-zinc-700 hover:bg-zinc-50 hover:text-zinc-900 cursor-pointer">
                                            <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                            Selesai
                                        </button>
                                    </form>

                                    <!-- Batal Option -->
                                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" class="flex items-center gap-2 w-full text-left px-3.5 py-2 text-xs font-semibold text-zinc-700 hover:bg-zinc-50 hover:text-zinc-900 cursor-pointer">
                                            <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
                                            Batal
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    
                    <!-- Action Buttons -->
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2.5">
                            <!-- Detail Button -->
                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="inline-flex items-center gap-1 border border-zinc-200 bg-white hover:bg-zinc-100 rounded-md text-xs font-medium text-zinc-700 px-3 py-1.5 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><circle cx="12" cy="12" r="3"/></svg>
                                Detail
                            </a>
                            
                            <!-- Delete Button -->
                            <button type="button" 
                                    onclick="triggerDeleteModal('{{ route('admin.bookings.destroy', $booking->id) }}', '{{ $booking->customer_name }}')"
                                    class="inline-flex items-center gap-1 border border-red-200 bg-white text-red-600 hover:bg-red-50 rounded-md text-xs font-medium px-3 py-1.5 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="max-w-md mx-auto py-6">
                            <div class="w-12 h-12 bg-zinc-100 rounded-full flex items-center justify-center mx-auto mb-3 border border-zinc-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-400"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 17H5"/><path d="M9 12H5"/><path d="M9 7H5"/></svg>
                            </div>
                            <h3 class="font-semibold text-zinc-900 text-sm">Tidak Ada Reservasi</h3>
                            <p class="text-zinc-500 text-xs mt-1 max-w-xs mx-auto">Tidak ada riwayat reservasi pelanggan dengan status penyaringan terpilih saat ini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($bookings->hasPages())
    <div class="px-6 py-4 border-t border-zinc-200 bg-zinc-50/50 flex items-center justify-between">
        {{ $bookings->links() }}
    </div>
    @endif
</div>

<!-- Shadcn style Alert Dialogue Delete Modal -->
<div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-zinc-950/40 backdrop-blur-sm transition-opacity duration-200" onclick="closeDeleteModal()"></div>
    
    <!-- Modal Box -->
    <div class="relative bg-white rounded-lg w-full max-w-[400px] p-6 shadow-lg border border-zinc-200 m-4 z-10 transform scale-95 opacity-0 transition-all duration-200" id="modal-box">
        <div class="space-y-4">
            <div class="space-y-2">
                <h3 class="text-lg font-semibold text-zinc-950 leading-none">Hapus Reservasi?</h3>
                <p class="text-zinc-500 text-sm leading-normal">
                    Apakah Anda yakin ingin menghapus reservasi atas nama <span id="target-customer-name" class="font-medium text-zinc-900"></span>? Tindakan ini tidak dapat dibatalkan.
                </p>
            </div>
            
            <!-- Actions -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-2 pt-2">
                <button type="button" 
                        onclick="closeDeleteModal()" 
                        class="w-full sm:w-auto inline-flex justify-center px-4 py-2 border border-zinc-250 bg-white hover:bg-zinc-50 text-zinc-700 rounded-md text-sm font-medium transition-colors">
                    Cancel
                </button>
                
                <form id="delete-form" action="" method="POST" class="w-full sm:w-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full sm:w-auto inline-flex justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm font-medium transition-colors">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function triggerDeleteModal(actionUrl, customerName) {
        const modal = document.getElementById('delete-modal');
        const modalBox = document.getElementById('modal-box');
        const deleteForm = document.getElementById('delete-form');
        const targetNameSpan = document.getElementById('target-customer-name');
        
        deleteForm.action = actionUrl;
        targetNameSpan.textContent = customerName;
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
    }
    
    function closeDeleteModal() {
        const modal = document.getElementById('delete-modal');
        const modalBox = document.getElementById('modal-box');
        
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }
</script>
@endsection