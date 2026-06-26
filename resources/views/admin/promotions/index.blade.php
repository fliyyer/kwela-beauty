@extends('admin.layouts.app')

@section('title', 'Daftar Promosi - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
    <div>
        <span class="text-xs font-bold uppercase tracking-widest text-[#5d3a3a]">Manajemen Kampanye</span>
        <h1 class="text-3xl md:text-4xl font-bold text-stone-900 tracking-tight mt-1 serif-font" style="font-family: 'Playfair Display', serif;">Daftar Promosi</h1>
        <p class="text-stone-500 text-sm mt-0.5">Kelola kupon diskon, promosi paket musiman, dan potongan harga eksklusif salon Anda.</p>
    </div>
    
    <a href="{{ route('admin.promotions.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#5d3a3a] text-white px-6 py-3.5 rounded-full font-semibold hover:bg-stone-900 transition-all duration-300 shadow-md hover:shadow-lg hover:scale-[1.02] active:scale-95 text-sm tracking-wide">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
        Tambah Promosi Baru
    </a>
</div>

<div class="bg-white rounded-[2.5rem] border border-stone-200/60 shadow-sm overflow-hidden mb-10">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-stone-50/80 border-b border-stone-100">
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider">Detail Promosi</th>
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider">Potongan</th>
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider">Masa Berlaku</th>
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider">Status</th>
                    <th class="px-8 py-5 text-xs font-bold text-stone-400 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @forelse($promotions as $promo)
                <tr class="hover:bg-stone-50/30 transition-colors duration-200 group">
                    <td class="px-8 py-5.5">
                        <div class="flex items-center">
                            <!-- Thumbnail representatif -->
                            <div class="w-14 h-14 rounded-2xl overflow-hidden bg-stone-100 flex-shrink-0 border border-stone-200/40 relative group-hover:scale-105 transition-transform duration-300 flex items-center justify-center">
                                @if($promo->image)
                                <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->title }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full bg-[#5d3a3a]/5 flex flex-col items-center justify-center text-[#5d3a3a] p-1 text-center">
                                    <span class="text-xs font-extrabold tracking-tighter leading-none">{{ $promo->discount }}%</span>
                                    <span class="text-[8px] uppercase font-bold opacity-80 mt-0.5">Off</span>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Detail Teks -->
                            <div class="ml-5">
                                <p class="font-bold text-stone-900 group-hover:text-[#5d3a3a] transition-colors duration-200">{{ $promo->title }}</p>
                                <p class="text-xs text-stone-400 mt-1 max-w-xs truncate">{{ $promo->description ?: 'Tidak ada deskripsi tambahan.' }}</p>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-8 py-5.5">
                        <span class="font-bold text-[#5d3a3a] text-sm bg-[#5d3a3a]/5 border border-[#5d3a3a]/10 px-3 py-1.5 rounded-xl">
                            {{ $promo->formatted_discount }}
                        </span>
                    </td>
                    
                    <td class="px-8 py-5.5">
                        <div class="flex flex-col gap-0.5">
                            @if($promo->start_date || $promo->end_date)
                            <span class="text-xs font-semibold text-stone-700">
                                {{ $promo->start_date ? $promo->start_date->format('d M Y') : 'N/A' }}
                            </span>
                            <span class="text-[10px] text-stone-400 font-medium">
                                s.d. {{ $promo->end_date ? $promo->end_date->format('d M Y') : 'Selesai' }}
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 text-xs text-amber-600 font-bold bg-amber-50 border border-amber-100/50 px-2.5 py-1 rounded-xl w-fit">
                                ♾️ Tanpa Batas
                            </span>
                            @endif
                        </div>
                    </td>
                    
                    <td class="px-8 py-5.5">
                        @if($promo->status === 'active')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full bg-emerald-50 text-emerald-800 border border-emerald-100/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Aktif
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full bg-stone-100 text-stone-600 border border-stone-200/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-stone-400"></span>
                            Nonaktif
                        </span>
                        @endif
                    </td>
                    
                    <td class="px-8 py-5.5 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.promotions.edit', $promo->id) }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-stone-600 hover:text-stone-900 bg-stone-100/80 hover:bg-stone-200/60 px-3.5 py-2 rounded-xl transition-all duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                Ubah
                            </a>
                            
                            <!-- Delete Trigger (Tanpa confirm native browser) -->
                            <button type="button" 
                                    onclick="triggerDeleteModal('{{ route('admin.promotions.destroy', $promo->id) }}', '{{ $promo->title }}')"
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
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="w-16 h-16 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-stone-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.008 1.24l.885 1.77a2.25 2.25 0 0 0 2.007 1.24h1.98a2.25 2.25 0 0 0 2.007-1.24l.885-1.77a2.25 2.25 0 0 1 2.007-1.24h3.86m-18 0h18" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-stone-800 text-lg">Belum Ada Promosi</h3>
                            <p class="text-stone-400 text-xs mt-1.5 max-w-sm mx-auto">Daftar penawaran atau potongan harga eksklusif Anda masih kosong. Silakan tambahkan promosi baru di atas.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

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
            
            <h3 class="text-xl font-bold text-stone-900 mb-2">Hapus Promosi?</h3>
            <p class="text-stone-500 text-sm leading-relaxed mb-6">
                Apakah Anda yakin ingin menghapus promosi <span id="target-promo-name" class="font-bold text-stone-800"></span>? Tindakan ini tidak dapat dibatalkan.
            </p>
            
            <!-- Tombol Aksi -->
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

<script>
    function triggerDeleteModal(actionUrl, promoTitle) {
        const modal = document.getElementById('delete-modal');
        const modalBox = document.getElementById('modal-box');
        const deleteForm = document.getElementById('delete-form');
        const targetNameSpan = document.getElementById('target-promo-name');
        
        // Atur action form dan judul target promosi
        deleteForm.action = actionUrl;
        targetNameSpan.textContent = promoTitle;
        
        // Tampilkan modal dengan transisi
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
    }
    
    function closeDeleteModal() {
        const modal = document.getElementById('delete-modal');
        const modalBox = document.getElementById('modal-box');
        
        // Sembunyikan modal dengan transisi
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>
@endsection