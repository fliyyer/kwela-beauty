@extends('admin.layouts.app')

@section('title', 'Ubah Voucher - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
    <div>
        <span class="text-xs font-bold uppercase tracking-widest text-[#5d3a3a]">Manajemen Diskon</span>
        <h1 class="text-3xl md:text-4xl font-bold text-stone-900 tracking-tight mt-1 serif-font" style="font-family: 'Playfair Display', serif;">Ubah Voucher</h1>
        <p class="text-stone-500 text-sm mt-0.5">Ubah detail kode voucher diskon yang sudah terdaftar.</p>
    </div>
    
    <a href="{{ route('admin.vouchers.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-stone-600 border border-stone-200 hover:border-stone-300 px-6 py-3.5 rounded-full font-semibold hover:bg-stone-50 transition-all duration-300 shadow-sm hover:shadow active:scale-95 text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"><line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Kembali ke Daftar
    </a>
</div>

<div class="bg-white rounded-[2.5rem] border border-stone-200/60 shadow-sm p-8 md:p-14 max-w-3xl relative overflow-hidden">
    <!-- Decorative glow -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-3xl pointer-events-none"></div>

    <form action="{{ route('admin.vouchers.update', $voucher->id) }}" method="POST" class="space-y-8 relative z-10">
        @csrf
        @method('PUT')
        
        <!-- Row 1: Code and Type -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="code" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Kode Voucher</label>
                <input type="text" name="code" id="code" value="{{ old('code', $voucher->code) }}" 
                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-mono font-bold uppercase @error('code') border-red-500 @enderror"
                    required placeholder="CONTOH: DISKON10" style="text-transform: uppercase;">
                <p class="text-[10px] text-stone-400 mt-1.5">Maksimal 50 karakter alfanumerik. Otomatis dikonversi ke huruf besar.</p>
                @error('code')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="type" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Tipe Potongan</label>
                <select name="type" id="type" 
                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-medium cursor-pointer @error('type') border-red-500 @enderror"
                    required>
                    <option value="fixed" {{ old('type', $voucher->type) == 'fixed' ? 'selected' : '' }}>Rupiah (Rp - Nominal Tetap)</option>
                    <option value="percent" {{ old('type', $voucher->type) == 'percent' ? 'selected' : '' }}>Persentase (% - Persen)</option>
                </select>
                @error('type')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Row 2: Value and Min Booking -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="value" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Nilai Potongan</label>
                <div class="relative rounded-2xl shadow-sm">
                    <div id="value-symbol-prefix" class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-stone-400 font-bold text-sm">
                        Rp
                    </div>
                    <input type="number" name="value" id="value" value="{{ old('value', $voucher->value) }}" step="0.01" min="0.01"
                        class="w-full pl-12 pr-12 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-bold placeholder-stone-400 @error('value') border-red-500 @enderror"
                        required placeholder="15000">
                    <div id="value-symbol-suffix" class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-stone-400 font-bold text-sm hidden">
                        %
                    </div>
                </div>
                <p class="text-[10px] text-stone-400 mt-1.5" id="value-helper-text">Masukkan nominal Rupiah (contoh: 20000 untuk Rp 20.000).</p>
                @error('value')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="min_booking_amount" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Minimal Pembelian (Booking)</label>
                <div class="relative rounded-2xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-stone-400 font-bold text-sm">
                        Rp
                    </div>
                    <input type="number" name="min_booking_amount" id="min_booking_amount" value="{{ old('min_booking_amount', $voucher->min_booking_amount) }}" min="0" step="0.01"
                        class="w-full pl-12 pr-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-bold placeholder-stone-400 @error('min_booking_amount') border-red-500 @enderror"
                        required placeholder="0">
                </div>
                <p class="text-[10px] text-stone-400 mt-1.5">Jumlah minimum biaya booking agar voucher ini dapat digunakan.</p>
                @error('min_booking_amount')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Row 3: Expiry and Limit -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="expires_at" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Masa Berlaku (Kedaluwarsa)</label>
                <input type="date" name="expires_at" id="expires_at" value="{{ old('expires_at', $voucher->expires_at ? $voucher->expires_at->format('Y-m-d') : '') }}"
                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-medium @error('expires_at') border-red-500 @enderror">
                <p class="text-[10px] text-stone-400 mt-1.5">Kosongkan jika voucher berlaku selamanya (tanpa batas waktu).</p>
                @error('expires_at')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="usage_limit" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Batas Total Penggunaan</label>
                <input type="number" name="usage_limit" id="usage_limit" value="{{ old('usage_limit', $voucher->usage_limit) }}" min="1"
                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-bold placeholder-stone-400 @error('usage_limit') border-red-500 @enderror"
                    placeholder="Contoh: 100">
                <p class="text-[10px] text-stone-400 mt-1.5">Kosongkan jika penggunaan tidak dibatasi.</p>
                @error('usage_limit')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Row 4: Status Active -->
        <div class="flex items-center gap-3 border-t border-stone-100 pt-8">
            <label class="relative inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ old('is_active', $voucher->is_active) ? 'checked' : '' }}>
                <div class="w-12 h-6.5 bg-stone-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-stone-300 after:border after:rounded-full after:h-5.5 after:w-5.5 after:transition-all peer-checked:bg-[#5d3a3a]"></div>
                <span class="ml-4 text-sm font-bold text-stone-700">Aktifkan Voucher</span>
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-4 border-t border-stone-100 pt-8">
            <button type="submit" class="w-full sm:w-auto px-10 py-4 bg-[#5d3a3a] hover:bg-stone-900 text-white rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300 uppercase text-xs tracking-wider">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.vouchers.index') }}" class="w-full sm:w-auto px-8 py-4 bg-stone-100 hover:bg-stone-200/80 text-stone-600 rounded-full font-bold text-center transition-all duration-300 uppercase text-xs tracking-wider">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('type');
        const prefixSymbol = document.getElementById('value-symbol-prefix');
        const suffixSymbol = document.getElementById('value-symbol-suffix');
        const valueInput = document.getElementById('value');
        const helperText = document.getElementById('value-helper-text');
        
        function updateSymbols() {
            if (typeSelect.value === 'percent') {
                prefixSymbol.classList.add('hidden');
                suffixSymbol.classList.remove('hidden');
                valueInput.className = valueInput.className.replace('pl-12', 'pl-5');
                helperText.textContent = "Masukkan persentase diskon (contoh: 10 untuk 10%). Maksimal 100%.";
                valueInput.max = "100";
            } else {
                prefixSymbol.classList.remove('hidden');
                suffixSymbol.classList.add('hidden');
                valueInput.className = valueInput.className.replace('pl-5', 'pl-12');
                helperText.textContent = "Masukkan nominal Rupiah (contoh: 20000 untuk Rp 20.000).";
                valueInput.removeAttribute('max');
            }
        }
        
        typeSelect.addEventListener('change', updateSymbols);
        // Run once on load to establish correct state
        updateSymbols();
    });
</script>
@endsection
