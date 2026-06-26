@extends('admin.layouts.app')

@section('title', 'Ubah Layanan - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
    <div>
        <span class="font-bold text-3xl md:text-4xl  text-[#5d3a3a]">Ubah Layanan</span>
        <p class="text-stone-500 text-sm mt-0.5">Perbarui informasi detail, harga investasi, gambar visual, serta status ketersediaan layanan studio Anda.</p>
    </div>
    
    <a href="{{ route('admin.services.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-stone-600 border border-stone-200 hover:border-stone-300 px-6 py-3.5 rounded-full font-semibold hover:bg-stone-50 transition-all duration-300 shadow-sm hover:shadow active:scale-95 text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Kembali ke Daftar
    </a>
</div>

<div class="bg-white rounded-[2.5rem] border border-stone-200/60 shadow-sm p-8 md:p-12 mb-10 relative overflow-hidden">
    <!-- Dekorasi Pendaran Estetik Tipis di Pojok Kartu -->
    <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-2xl pointer-events-none"></div>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
        @csrf
        @method('PUT')
        
        <!-- Baris Pertama: Nama Layanan & Harga -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Nama Layanan -->
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Nama Layanan *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" 
                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-medium @error('name') border-red-500 @enderror"
                    required placeholder="Contoh: Signature Eyelash Extension">
                @error('name')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Harga Investasi -->
            <div>
                <label for="price" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Investasi Harga (Rupiah) *</label>
                <div class="relative rounded-2xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-stone-400 font-bold text-sm">Rp</span>
                    </div>
                    <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}" min="0" step="0.01"
                        class="w-full pl-12 pr-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-semibold @error('price') border-red-500 @enderror"
                        required placeholder="0">
                </div>
                @error('price')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Baris Kedua: Deskripsi Layanan -->
        <div>
            <label for="description" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Deskripsi Layanan</label>
            <textarea name="description" id="description" rows="4" 
                class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-medium leading-relaxed @error('description') border-red-500 @enderror"
                placeholder="Tuliskan deskripsi lengkap, keuntungan treatment, atau durasi pengerjaan layanan...">{{ old('description', $service->description) }}</textarea>
            @error('description')
            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Baris Ketiga: Pengaturan Media Gambar -->
        <div>
            <span class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-3">Foto Visual Layanan</span>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center bg-stone-50/40 border border-stone-200/40 p-6 rounded-3xl">
                <!-- Preview Gambar Saat Ini -->
                @if($service->image)
                <div class="lg:col-span-3 flex flex-col items-center justify-center border-r border-stone-200/50 pr-0 lg:pr-8 py-2">
                    <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-3 text-center block">Gambar Saat Ini</span>
                    <div class="w-28 h-28 rounded-2xl overflow-hidden border border-stone-200/60 shadow-inner bg-white relative group">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
                @endif
                
                <!-- Unggah Gambar Baru -->
                <div class="{{ $service->image ? 'lg:col-span-9' : 'lg:col-span-12' }} w-full">
                    <label class="flex flex-col items-center justify-center w-full h-36 border-2 border-stone-200 border-dashed rounded-2xl cursor-pointer bg-white hover:bg-stone-50/50 hover:border-[#5d3a3a]/40 transition-all duration-300 group">
                        <div class="flex flex-col items-center justify-center pt-4 pb-4 text-center px-4">
                            <svg class="w-8 h-8 text-stone-400 mb-2 group-hover:text-[#5d3a3a] transition-colors" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                            </svg>
                            <p class="text-sm text-stone-600 font-bold group-hover:text-[#5d3a3a] transition-colors" id="file-upload-text">Klik untuk memilih atau seret gambar ke sini</p>
                            <p class="text-[10px] text-stone-400 mt-1">Maks. 2MB (Format: JPEG, PNG, JPG, GIF, SVG). Biarkan kosong jika tidak ingin diubah.</p>
                        </div>
                        <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="updateUploadFeedback(this)">
                    </label>
                    @error('image')
                    <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Baris Keempat: Status Layanan -->
        <div>
            <label for="status" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Status Publikasi Layanan *</label>
            <div class="relative">
                <select name="status" id="status" 
                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-bold cursor-pointer appearance-none @error('status') border-red-500 @enderror"
                    required>
                    <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Aktif (Ditampilkan dalam Katalog Website)</option>
                    <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Nonaktif (Disembunyikan Sementara)</option>
                </select>
            </div>
            @error('status')
            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Baris Kelima: Tombol Aksi Batal / Simpan -->
        <div class="mt-12 pt-8 border-t border-stone-100 flex flex-col sm:flex-row items-center justify-end gap-4">
            <!-- Batalkan -->
            <a href="{{ route('admin.services.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 border border-stone-200 text-stone-600 rounded-full font-semibold hover:bg-stone-50 hover:text-stone-900 transition-colors duration-200 text-sm">
                Batalkan
            </a>
            
            <!-- Simpan Perubahan -->
            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#5d3a3a] text-white px-8 py-3.5 rounded-full font-bold hover:bg-stone-900 transition-all duration-300 shadow-md hover:shadow-lg hover:scale-[1.02] active:scale-95 text-sm tracking-wide">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    /**
     * Memberikan umpan balik instan saat admin memilih berkas gambar baru.
     */
    function updateUploadFeedback(input) {
        const textElement = document.getElementById('file-upload-text');
        if (input.files && input.files.length > 0) {
            textElement.textContent = `Berkas dipilih: ${input.files[0].name}`;
            textElement.classList.remove('text-stone-600');
            textElement.classList.add('text-[#5d3a3a]', 'font-bold');
        } else {
            textElement.textContent = 'Klik untuk memilih atau seret gambar ke sini';
            textElement.classList.remove('text-[#5d3a3a]');
            textElement.classList.add('text-stone-600');
        }
    }
</script>
@endsection