@extends('admin.layouts.app')

@section('title', 'Pengaturan Kontak - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
    <div>
        <span class="text-xs font-bold uppercase tracking-widest text-[#5d3a3a]">Konfigurasi Sistem</span>
        <h1 class="text-3xl md:text-4xl font-bold text-stone-900 tracking-tight mt-1 serif-font" style="font-family: 'Playfair Display', serif;">Pengaturan Kontak</h1>
        <p class="text-stone-500 text-sm mt-0.5">Kelola informasi narahubung, akun media sosial, dan titik peta interaktif studio kecantikan Anda.</p>
    </div>
</div>

<div class="bg-white rounded-[2.5rem] border border-stone-200/60 shadow-sm p-8 md:p-12 mb-10 relative overflow-hidden">
    <!-- Dekorasi Pendaran Estetik Tipis di Pojok Kartu -->
    <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-2xl pointer-events-none"></div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8 relative z-10">
        @csrf
        
        <!-- Baris Pertama: WhatsApp & Instagram -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Input WhatsApp -->
            <div>
                <label for="whatsapp" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Nomor WhatsApp Utama *</label>
                <div class="relative rounded-2xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-stone-400 text-sm font-semibold">🇮🇩</span>
                    </div>
                    <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $whatsapp) }}" 
                        class="w-full pl-12 pr-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-semibold @error('whatsapp') border-red-500 @enderror"
                        required placeholder="Contoh: 085126485450">
                </div>
                @error('whatsapp')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Input Instagram -->
            <div>
                <label for="instagram" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Nama Pengguna Instagram *</label>
                <div class="relative rounded-2xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span class="text-stone-400 text-sm font-semibold">📸</span>
                    </div>
                    <input type="text" name="instagram" id="instagram" value="{{ old('instagram', $instagram) }}" 
                        class="w-full pl-12 pr-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-semibold @error('instagram') border-red-500 @enderror"
                        required placeholder="Contoh: @kwela_beautystudio">
                </div>
                @error('instagram')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Baris Kedua: Alamat Lengkap Studio -->
        <div>
            <label for="address" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Alamat Lengkap Studio *</label>
            <textarea name="address" id="address" rows="4" 
                class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-medium leading-relaxed @error('address') border-red-500 @enderror"
                required placeholder="Tuliskan alamat lengkap studio kecantikan Anda termasuk patokan jalan atau detail gedung...">{{ old('address', $address) }}</textarea>
            @error('address')
            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Baris Ketiga: Tautan Google Maps Semat (Embed URL) -->
        <div>
            <label for="maps_link" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Tautan Semat (Embed URL) Google Maps *</label>
            <input type="url" name="maps_link" id="maps_link" value="{{ old('maps_link', $mapsLink) }}" 
                class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-semibold @error('maps_link') border-red-500 @enderror"
                required placeholder="https://maps.google.com/maps/embed?pb=...">
            
            <!-- Petunjuk Semat Google Maps yang Informatif -->
            <div class="mt-3 bg-stone-50 border border-stone-100 p-4 rounded-2xl flex items-start gap-3">
                <div class="bg-[#5d3a3a]/10 text-[#5d3a3a] p-1.5 rounded-xl flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.083 1.083l-.041.02a.75.75 0 01-1.083-1.083zM12 21a9 9 0 100-18 9 9 0 000 18z" />
                    </svg>
                </div>
                <div>
                    <span class="block text-[11px] font-bold text-stone-700 uppercase tracking-wide">Cara Mendapatkan Tautan Google Maps:</span>
                    <p class="text-stone-400 text-xs leading-relaxed mt-1">
                        Buka Google Maps -> Cari lokasi studio Anda -> Klik tombol <strong class="text-stone-600 font-semibold">Bagikan</strong> -> Pilih tab <strong class="text-stone-600 font-semibold">Sematkan peta (Embed a map)</strong> -> Salin hanya isi alamat tautan di dalam kutipan atribut <strong class="text-[#5d3a3a] font-semibold">src="..."</strong> dari kode iframe yang disediakan.
                    </p>
                </div>
            </div>
            @error('maps_link')
            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Baris Keempat: Tombol Aksi Simpan Pengaturan -->
        <div class="mt-12 pt-8 border-t border-stone-100 flex items-center justify-end">
            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#5d3a3a] text-white px-8 py-4 rounded-full font-bold hover:bg-stone-900 transition-all duration-300 shadow-md hover:shadow-lg hover:scale-[1.02] active:scale-95 text-sm tracking-wide">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Simpan Konfigurasi Kontak
            </button>
        </div>
    </form>
</div>
@endsection