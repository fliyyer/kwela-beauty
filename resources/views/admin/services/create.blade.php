@extends('admin.layouts.app')

@section('title', 'Tambah Layanan Baru - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Add Service</h1>
        <p class="text-zinc-500 text-sm mt-1">Buat katalog perawatan kecantikan baru untuk studio Anda.</p>
    </div>
    
    <a href="{{ route('admin.services.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-zinc-700 border border-zinc-200 hover:bg-zinc-50 px-4 py-2 rounded-md font-medium text-sm transition-colors shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m19 12-7-7-7 7"/><path d="M5 12h14"/></svg>
        Kembali ke Daftar
    </a>
</div>

<div class="bg-white rounded-lg border border-zinc-200 shadow-sm p-6 max-w-3xl">
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Row 1: Name & Price -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Nama Layanan *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
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
                    <input type="number" name="price" id="price" value="{{ old('price') }}" min="0" step="0.01"
                        class="w-full pl-9 pr-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-semibold @error('price') border-red-500 @enderror"
                        required placeholder="150000">
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
                placeholder="Tuliskan deskripsi lengkap, keuntungan treatment, atau durasi pengerjaan layanan...">{{ old('description') }}</textarea>
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
                    <option value="" {{ old('discount_type') == '' ? 'selected' : '' }}>Tidak Ada Diskon</option>
                    <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Nominal Tetap (Rp)</option>
                    <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Persentase (%)</option>
                </select>
                @error('discount_type')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="discount_value" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Nilai Diskon</label>
                <input type="number" name="discount_value" id="discount_value" value="{{ old('discount_value') }}" min="0" step="0.01"
                    class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-semibold @error('discount_value') border-red-500 @enderror"
                    placeholder="Contoh: 10000 atau 10">
                @error('discount_value')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Row 3: Image Upload -->
        <div>
            <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Foto Layanan</label>
            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col items-center justify-center w-full h-32 border border-zinc-200 border-dashed rounded-md cursor-pointer bg-white hover:bg-zinc-50/50 transition-colors group">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                        <svg class="w-6 h-6 text-zinc-400 mb-2 group-hover:text-zinc-650 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                        </svg>
                        <p class="text-xs text-zinc-600 font-bold group-hover:text-zinc-800 transition-colors" id="file-upload-text">Klik untuk memilih gambar layanan</p>
                        <p class="text-[10px] text-zinc-400 mt-1">Maksimal 2MB. Format: JPEG, PNG, JPG, GIF, SVG</p>
                    </div>
                    <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="updateUploadFeedback(this)">
                </label>
            </div>
            @error('image')
            <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Row 4: Status -->
        <div>
            <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Status Publikasi *</label>
            <select name="status" id="status" 
                class="w-full px-3 py-2 border border-zinc-200 bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 text-sm font-medium cursor-pointer @error('status') border-red-500 @enderror"
                required>
                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Aktif (Tampil di Katalog Website)</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Nonaktif (Disembunyikan)</option>
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
                Tambah Layanan
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
            textElement.textContent = 'Klik untuk memilih gambar layanan';
            textElement.classList.remove('text-zinc-950');
        }
    }
</script>
@endsection
