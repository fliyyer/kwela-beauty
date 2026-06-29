@extends('admin.layouts.app')

@section('title', 'Pengaturan Kontak - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Contact Settings</h1>
        <p class="text-zinc-500 text-sm mt-1">Kelola informasi narahubung, akun media sosial, dan titik peta interaktif studio kecantikan Anda.</p>
    </div>
</div>

<div class="bg-white rounded-lg border border-zinc-200 shadow-sm p-6 max-w-3xl">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Row 1: WhatsApp & Instagram -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Input WhatsApp -->
            <div>
                <label for="whatsapp" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Nomor WhatsApp Utama *</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-zinc-400 text-sm font-semibold">🇮🇩</span>
                    </div>
                    <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $whatsapp) }}" 
                        class="w-full pl-9 pr-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-semibold @error('whatsapp') border-red-500 @enderror"
                        required placeholder="Contoh: 085126485450">
                </div>
                @error('whatsapp')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Input Instagram -->
            <div>
                <label for="instagram" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Nama Pengguna Instagram *</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400 font-bold text-sm">
                        @
                    </div>
                    <input type="text" name="instagram" id="instagram" value="{{ old('instagram', $instagram) }}" 
                        class="w-full pl-9 pr-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-semibold @error('instagram') border-red-500 @enderror"
                        required placeholder="Contoh: kwela_beautystudio">
                </div>
                @error('instagram')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Row 2: Address -->
        <div>
            <label for="address" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Alamat Lengkap Studio *</label>
            <textarea name="address" id="address" rows="4" 
                class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-medium leading-relaxed @error('address') border-red-500 @enderror"
                required placeholder="Tuliskan alamat lengkap studio kecantikan Anda termasuk patokan jalan atau detail gedung...">{{ old('address', $address) }}</textarea>
            @error('address')
            <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Row 3: Maps Link -->
        <div>
            <label for="maps_link" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Tautan Semat (Embed URL) Google Maps *</label>
            <input type="url" name="maps_link" id="maps_link" value="{{ old('maps_link', $mapsLink) }}" 
                class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-semibold @error('maps_link') border-red-500 @enderror"
                required placeholder="https://maps.google.com/maps/embed?pb=...">
            
            <!-- Instructions Box -->
            <div class="mt-3 bg-zinc-50 border border-zinc-200 p-4 rounded-md flex items-start gap-3">
                <div class="bg-zinc-100 text-zinc-650 p-1.5 rounded-md border border-zinc-200 flex-shrink-0 mt-0.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.083 1.083l-.041.02a.75.75 0 01-1.083-1.083zM12 21a9 9 0 100-18 9 9 0 000 18z" />
                    </svg>
                </div>
                <div>
                    <span class="block text-[11px] font-bold text-zinc-700 uppercase tracking-wide">Cara Mendapatkan Tautan Google Maps:</span>
                    <p class="text-zinc-500 text-xs leading-relaxed mt-1">
                        Buka Google Maps -> Cari lokasi studio Anda -> Klik tombol <strong class="text-zinc-800 font-semibold">Bagikan</strong> -> Pilih tab <strong class="text-zinc-800 font-semibold">Sematkan peta (Embed a map)</strong> -> Salin hanya isi alamat tautan di dalam kutipan atribut <strong class="text-zinc-900 font-semibold">src="..."</strong> dari kode iframe yang disediakan.
                    </p>
                </div>
            </div>
            @error('maps_link')
            <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Row 4: Booking Operating Hours Settings -->
        <div class="border-t border-zinc-150 pt-6">
            <h3 class="text-sm font-bold text-zinc-950 mb-3 uppercase tracking-wider">Jam Operasional Booking</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-zinc-50/50 p-4 border border-zinc-250 rounded-md">
                <!-- Start Hour -->
                <div>
                    <label for="booking_start_time" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Jam Mulai Operasional *</label>
                    <select name="booking_start_time" id="booking_start_time" 
                        class="w-full px-3 py-2 border border-zinc-200 bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 text-sm font-medium cursor-pointer @error('booking_start_time') border-red-500 @enderror"
                        required>
                        @foreach(['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00'] as $time)
                            <option value="{{ $time }}" {{ old('booking_start_time', $bookingStartTime) == $time ? 'selected' : '' }}>{{ $time }}</option>
                        @endforeach
                    </select>
                    @error('booking_start_time')
                    <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Hour -->
                <div>
                    <label for="booking_end_time" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Jam Selesai Operasional *</label>
                    <select name="booking_end_time" id="booking_end_time" 
                        class="w-full px-3 py-2 border border-zinc-200 bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 text-sm font-medium cursor-pointer @error('booking_end_time') border-red-500 @enderror"
                        required>
                        @foreach(['15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'] as $time)
                            <option value="{{ $time }}" {{ old('booking_end_time', $bookingEndTime) == $time ? 'selected' : '' }}>{{ $time }}</option>
                        @endforeach
                    </select>
                    @error('booking_end_time')
                    <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Actions -->
        <div class="mt-6 pt-4 border-t border-zinc-100 flex items-center justify-end">
            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 bg-zinc-900 text-zinc-50 px-4 py-2 rounded-md font-medium hover:bg-zinc-800 transition-colors shadow text-sm tracking-wide">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Simpan Konfigurasi
            </button>
        </div>
    </form>
</div>
@endsection