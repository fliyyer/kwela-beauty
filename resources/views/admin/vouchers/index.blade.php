@extends('admin.layouts.app')

@section('title', 'Daftar Voucher - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Vouchers</h1>
        <p class="text-zinc-500 text-sm mt-1">Kelola kode voucher diskon untuk potongan harga booking bagi pelanggan Anda.</p>
    </div>
    
    <a href="{{ route('admin.vouchers.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-zinc-900 text-zinc-50 px-4 py-2.5 rounded-md font-medium hover:bg-zinc-800 transition-colors shadow-sm text-sm tracking-wide">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
        Tambah Voucher Baru
    </a>
</div>

<div class="bg-white rounded-lg border border-zinc-200 shadow-sm overflow-hidden mb-10">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-zinc-50/75 border-b border-zinc-200 text-zinc-500 font-medium text-xs uppercase tracking-wider">
                    <th class="px-6 py-4">Kode Voucher</th>
                    <th class="px-6 py-4">Potongan</th>
                    <th class="px-6 py-4">Min. Booking</th>
                    <th class="px-6 py-4">Penggunaan</th>
                    <th class="px-6 py-4">Masa Berlaku</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200">
                @forelse($vouchers as $voucher)
                <tr class="hover:bg-zinc-50/50 transition-colors duration-200">
                    <td class="px-6 py-4">
                        <span class="font-mono font-bold text-zinc-900 text-sm bg-zinc-100 border border-zinc-200 px-2.5 py-1 rounded">
                            {{ $voucher->code }}
                        </span>
                    </td>
                    
                    <td class="px-6 py-4">
                        <span class="font-medium text-zinc-800 text-sm bg-zinc-100 border border-zinc-200 px-2.5 py-1 rounded">
                            {{ $voucher->formatted_value }}
                        </span>
                    </td>
                    
                    <td class="px-6 py-4">
                        <span class="text-sm font-semibold text-zinc-700">
                            {{ $voucher->formatted_min_booking }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-xs font-semibold text-zinc-800">
                                {{ $voucher->usage_count }} Kali Terpakai
                            </span>
                            <span class="text-[10px] text-zinc-400 font-medium">
                                Batas: {{ $voucher->usage_limit ? $voucher->usage_limit . ' Kali' : 'Tanpa Batas' }}
                            </span>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4">
                        <span class="text-xs font-medium text-zinc-700">
                            {{ $voucher->expires_at ? $voucher->expires_at->format('d M Y') : '♾️ Tidak Kedaluwarsa' }}
                        </span>
                    </td>
                    
                    <td class="px-6 py-4">
                        @php
                            $isValid = $voucher->isValid();
                        @endphp
                        @if($voucher->is_active && $isValid)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 text-xs font-medium rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Aktif
                        </span>
                        @elseif(!$voucher->is_active)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 text-xs font-medium rounded-full bg-zinc-100 text-zinc-800 border border-zinc-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-zinc-400"></span>
                            Nonaktif
                        </span>
                        @elseif($voucher->usage_limit !== null && $voucher->usage_count >= $voucher->usage_limit)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 text-xs font-medium rounded-full bg-amber-50 text-amber-800 border border-amber-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-550"></span>
                            Habis
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 text-xs font-medium rounded-full bg-red-50 text-red-800 border border-red-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                            Batal
                        </span>
                        @endif
                    </td>
                    
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2.5">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.vouchers.edit', $voucher->id) }}" class="inline-flex items-center gap-1 border border-zinc-200 bg-white hover:bg-zinc-100 rounded-md text-xs font-medium text-zinc-700 px-3 py-1.5 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                Ubah
                            </a>
                            
                            <!-- Delete Trigger -->
                            <button type="button" 
                                    onclick="triggerDeleteModal('{{ route('admin.vouchers.destroy', $voucher->id) }}', '{{ $voucher->code }}')"
                                    class="inline-flex items-center gap-1 border border-red-200 bg-white text-red-600 hover:bg-red-50 rounded-md text-xs font-medium px-3 py-1.5 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="max-w-md mx-auto py-6">
                            <div class="w-12 h-12 bg-zinc-100 rounded-full flex items-center justify-center mx-auto mb-3 border border-zinc-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-400"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 17H5"/><path d="M9 12H5"/><path d="M9 7H5"/></svg>
                            </div>
                            <h3 class="font-semibold text-zinc-900 text-sm">Belum Ada Voucher</h3>
                            <p class="text-zinc-500 text-xs mt-1 max-w-xs mx-auto">Daftar kode voucher diskon masih kosong. Silakan buat voucher baru dengan menekan tombol di atas.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($vouchers->hasPages())
    <div class="px-6 py-4 border-t border-zinc-200 bg-zinc-50/50 flex items-center justify-between">
        {{ $vouchers->links() }}
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
                <h3 class="text-lg font-semibold text-zinc-950 leading-none">Hapus Voucher?</h3>
                <p class="text-zinc-500 text-sm leading-normal">
                    Apakah Anda yakin ingin menghapus voucher <span id="target-voucher-code" class="font-medium text-zinc-900"></span>? Tindakan ini tidak dapat dibatalkan.
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
    function triggerDeleteModal(actionUrl, voucherCode) {
        const modal = document.getElementById('delete-modal');
        const modalBox = document.getElementById('modal-box');
        const deleteForm = document.getElementById('delete-form');
        const targetCodeSpan = document.getElementById('target-voucher-code');
        
        deleteForm.action = actionUrl;
        targetCodeSpan.textContent = voucherCode;
        
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
