@extends('admin.layouts.app')

@section('title', 'Ubah Layanan - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Edit Service</h1>
        <p class="text-zinc-500 text-sm mt-1">Perbarui detail katalog layanan kecantikan studio Anda.</p>
    </div>
    
    <a href="{{ route('admin.services.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-zinc-700 border border-zinc-200 hover:bg-zinc-50 px-4 py-2 rounded-md font-medium text-sm transition-colors shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m19 12-7-7-7 7"/><path d="M5 12h14"/></svg>
        Kembali ke Daftar
    </a>
</div>

<div class="bg-white rounded-lg border border-zinc-200 shadow-sm p-6 max-w-3xl">
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Row 1: Name & Price -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Nama Layanan *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" 
                    class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-medium @error('name') border-red-500 @enderror"
                    required placeholder="Contoh: Signature Eyelash Extension">
                @error('name')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Harga Layanan (Rupiah) *</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400 font-semibold text-sm">
                        Rp
                    </div>
                    <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}" min="0" step="0.01"
                        class="w-full pl-9 pr-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-semibold @error('price') border-red-500 @enderror"
                        required placeholder="0">
                </div>
                @error('price')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Row 2: Description -->
        <div>
            <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Deskripsi Layanan</label>
            <textarea name="description" id="description" rows="4" 
                class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-medium leading-relaxed @error('description') border-red-500 @enderror"
                placeholder="Tuliskan deskripsi lengkap, keuntungan treatment, atau durasi pengerjaan layanan...">{{ old('description', $service->description) }}</textarea>
            @error('description')
            <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Row 2.5: Discount Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-zinc-50/50 p-4 border border-zinc-200 rounded-md">
            <div>
                <label for="discount_type" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Tipe Diskon</label>
                <select name="discount_type" id="discount_type" 
                    class="w-full px-3 py-2 border border-zinc-200 bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 text-sm font-medium cursor-pointer @error('discount_type') border-red-500 @enderror">
                    <option value="" {{ old('discount_type', $service->discount_type) == '' ? 'selected' : '' }}>Tidak Ada Diskon</option>
                    <option value="fixed" {{ old('discount_type', $service->discount_type) == 'fixed' ? 'selected' : '' }}>Nominal Tetap (Rp)</option>
                    <option value="percentage" {{ old('discount_type', $service->discount_type) == 'percentage' ? 'selected' : '' }}>Persentase (%)</option>
                </select>
                @error('discount_type')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="discount_value" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Nilai Diskon</label>
                <input type="number" name="discount_value" id="discount_value" value="{{ old('discount_value', $service->discount_value) }}" min="0" step="0.01"
                    class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-semibold @error('discount_value') border-red-500 @enderror"
                    placeholder="Contoh: 10000 atau 10">
                @error('discount_value')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Row 3: Image -->
        <div>
            <span class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-2">Foto Layanan</span>
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 items-center border border-zinc-200 p-4 rounded-md bg-zinc-50/50">
                <!-- Preview current image -->
                @if($service->image)
                <div class="sm:col-span-3 flex flex-col items-center justify-center border-r border-zinc-200 pr-0 sm:pr-6 py-1">
                    <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-wider mb-2 text-center block">Gambar Aktif</span>
                    <div class="w-20 h-20 rounded border border-zinc-200 overflow-hidden bg-white">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                    </div>
                </div>
                @endif
                
                <!-- Upload new image -->
                <div class="{{ $service->image ? 'sm:col-span-9' : 'sm:col-span-12' }} w-full">
                    <label class="flex flex-col items-center justify-center w-full h-24 border border-zinc-200 border-dashed rounded-md cursor-pointer bg-white hover:bg-zinc-50/50 transition-colors group">
                        <div class="flex flex-col items-center justify-center text-center px-4">
                            <svg class="w-5 h-5 text-zinc-400 mb-1 group-hover:text-zinc-650" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                            </svg>
                            <p class="text-xs text-zinc-600 font-bold group-hover:text-zinc-800 transition-colors" id="file-upload-text">Klik untuk memilih foto baru</p>
                            <p class="text-[10px] text-zinc-400 mt-0.5">Biarkan kosong jika tidak diubah.</p>
                        </div>
                        <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="updateUploadFeedback(this)">
                    </label>
                    @error('image')
                    <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Row 4: Status -->
        <div>
            <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Status Publikasi *</label>
            <select name="status" id="status" 
                class="w-full px-3 py-2 border border-zinc-200 bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 text-sm font-medium cursor-pointer @error('status') border-red-500 @enderror"
                required>
                <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Aktif (Tampil di Katalog Website)</option>
                <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Nonaktif (Disembunyikan)</option>
            </select>
            @error('status')
            <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Actions -->
        <div class="mt-6 flex items-center justify-end gap-3 border-t border-zinc-100 pt-4">
            <a href="{{ route('admin.services.index') }}" class="px-4 py-2 border border-zinc-200 bg-white hover:bg-zinc-50 text-zinc-700 rounded-md text-sm font-medium transition-colors">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-zinc-900 hover:bg-zinc-800 text-zinc-50 rounded-md text-sm font-medium transition-colors shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function updateUploadFeedback(input) {
        const textElement = document.getElementById('file-upload-text');
        if (input.files && input.files.length > 0) {
            textElement.textContent = `Berkas dipilih: ${input.files[0].name}`;
            textElement.classList.add('text-zinc-950');
        } else {
            textElement.textContent = 'Klik untuk memilih foto baru';
            textElement.classList.remove('text-zinc-950');
        }
    }
</script>
@endsection