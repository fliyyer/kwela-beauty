@extends('admin.layouts.app')

@section('title', 'Daftar Promosi - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Promotions</h1>
        <p class="text-zinc-500 text-sm mt-1">Kelola kupon diskon, promosi paket musiman, dan potongan harga eksklusif salon Anda.</p>
    </div>
    
    <a href="{{ route('admin.promotions.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-zinc-900 text-zinc-50 px-4 py-2.5 rounded-md font-medium hover:bg-zinc-800 transition-colors shadow-sm text-sm tracking-wide">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
        Tambah Promosi Baru
    </a>
</div>

<div class="bg-white rounded-lg border border-zinc-200 shadow-sm overflow-hidden mb-10">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-zinc-50/75 border-b border-zinc-200 text-zinc-500 font-medium text-xs uppercase tracking-wider">
                    <th class="px-6 py-4">Detail Promosi</th>
                    <th class="px-6 py-4">Potongan</th>
                    <th class="px-6 py-4">Masa Berlaku</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200">
                @forelse($promotions as $promo)
                <tr class="hover:bg-zinc-50/50 transition-colors duration-200">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <!-- Thumbnail -->
                            <div class="w-12 h-12 rounded-md overflow-hidden bg-zinc-50 flex-shrink-0 border border-zinc-200 flex items-center justify-center">
                                @if($promo->image)
                                <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->title }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full bg-zinc-100 flex flex-col items-center justify-center text-zinc-700 p-1 text-center">
                                    <span class="text-xs font-bold leading-none">{{ $promo->discount }}%</span>
                                    <span class="text-[8px] uppercase font-bold opacity-80 mt-0.5">Off</span>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Texts -->
                            <div class="ml-4">
                                <p class="font-semibold text-zinc-900 text-sm">{{ $promo->title }}</p>
                                <p class="text-xs text-zinc-500 mt-0.5 max-w-xs truncate">{{ $promo->description ?: 'Tidak ada deskripsi tambahan.' }}</p>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4">
                        <span class="font-medium text-zinc-800 text-sm bg-zinc-100 border border-zinc-200 px-2.5 py-1 rounded">
                            {{ $promo->formatted_discount }}
                        </span>
                    </td>
                    
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-0.5">
                            @if($promo->start_date || $promo->end_date)
                            <span class="text-xs font-semibold text-zinc-700">
                                {{ $promo->start_date ? $promo->start_date->format('d M Y') : 'N/A' }}
                            </span>
                            <span class="text-[10px] text-zinc-400 font-medium">
                                s.d. {{ $promo->end_date ? $promo->end_date->format('d M Y') : 'Selesai' }}
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 text-xs text-zinc-500 font-medium">
                                ♾️ Tanpa Batas
                            </span>
                            @endif
                        </div>
                    </td>
                    
                    <!-- Status Badge / Custom Alpine Dropdown -->
                    <td class="px-6 py-4">
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            <button @click="open = !open" type="button" 
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-full border transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-zinc-950 cursor-pointer
                                {{ $promo->status === 'active' ? 'bg-emerald-50 text-emerald-800 border-emerald-200 hover:bg-emerald-100/60' : '' }}
                                {{ $promo->status === 'inactive' ? 'bg-zinc-100 text-zinc-800 border-zinc-200 hover:bg-zinc-150/60' : '' }}">
                                
                                @if($promo->status === 'active')
                                    <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                    <span>Aktif</span>
                                @else
                                    <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
                                    <span>Nonaktif</span>
                                @endif
                                
                                <svg class="w-3 h-3 ml-0.5 opacity-60" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition 
                                class="origin-top-left absolute left-0 mt-1.5 w-36 rounded-md shadow-md bg-white border border-zinc-200 focus:outline-none z-30" style="display: none;">
                                <div class="py-1">
                                    <!-- Aktif Option -->
                                    <form action="{{ route('admin.promotions.updateStatus', $promo->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="active">
                                        <button type="submit" class="flex items-center gap-2 w-full text-left px-3.5 py-2 text-xs font-semibold text-zinc-700 hover:bg-zinc-50 hover:text-zinc-900 cursor-pointer">
                                            <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                            Aktif
                                        </button>
                                    </form>

                                    <!-- Nonaktif Option -->
                                    <form action="{{ route('admin.promotions.updateStatus', $promo->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="inactive">
                                        <button type="submit" class="flex items-center gap-2 w-full text-left px-3.5 py-2 text-xs font-semibold text-zinc-700 hover:bg-zinc-50 hover:text-zinc-900 cursor-pointer">
                                            <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
                                            Nonaktif
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2.5">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.promotions.edit', $promo->id) }}" class="inline-flex items-center gap-1 border border-zinc-200 bg-white hover:bg-zinc-100 rounded-md text-xs font-medium text-zinc-700 px-3 py-1.5 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                Ubah
                            </a>
                            
                            <!-- Delete Trigger -->
                            <button type="button" 
                                    onclick="triggerDeleteModal('{{ route('admin.promotions.destroy', $promo->id) }}', '{{ $promo->title }}')"
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
                            <h3 class="font-semibold text-zinc-900 text-sm">Belum Ada Promosi</h3>
                            <p class="text-zinc-500 text-xs mt-1 max-w-xs mx-auto">Daftar penawaran atau potongan harga eksklusif Anda masih kosong. Silakan tambahkan promosi baru di atas.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($promotions->hasPages())
    <div class="px-6 py-4 border-t border-zinc-200 bg-zinc-50/50 flex items-center justify-between">
        {{ $promotions->links() }}
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
                <h3 class="text-lg font-semibold text-zinc-950 leading-none">Hapus Promosi?</h3>
                <p class="text-zinc-500 text-sm leading-normal">
                    Apakah Anda yakin ingin menghapus promosi <span id="target-promo-name" class="font-medium text-zinc-900"></span>? Tindakan ini tidak dapat dibatalkan.
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
    function triggerDeleteModal(actionUrl, promoTitle) {
        const modal = document.getElementById('delete-modal');
        const modalBox = document.getElementById('modal-box');
        const deleteForm = document.getElementById('delete-form');
        const targetNameSpan = document.getElementById('target-promo-name');
        
        deleteForm.action = actionUrl;
        targetNameSpan.textContent = promoTitle;
        
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