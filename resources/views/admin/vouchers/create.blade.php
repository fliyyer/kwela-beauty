@extends('admin.layouts.app')

@section('title', 'Tambah Voucher Baru - Panel Admin Kwéla')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900">Add Voucher</h1>
        <p class="text-zinc-500 text-sm mt-1">Buat kode voucher potongan harga untuk promosi atau event tertentu.</p>
    </div>
    
    <a href="{{ route('admin.vouchers.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-zinc-700 border border-zinc-200 hover:bg-zinc-50 px-4 py-2 rounded-md font-medium text-sm transition-colors shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m19 12-7-7-7 7"/><path d="M5 12h14"/></svg>
        Kembali ke Daftar
    </a>
</div>

<div class="bg-white rounded-lg border border-zinc-200 shadow-sm p-6 max-w-3xl">
    <form action="{{ route('admin.vouchers.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Row 1: Code and Type -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="code" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Kode Voucher</label>
                <input type="text" name="code" id="code" value="{{ old('code') }}" 
                    class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 placeholder-zinc-400 font-mono font-bold uppercase @error('code') border-red-500 @enderror"
                    required placeholder="CONTOH: DISKON10" style="text-transform: uppercase;">
                <p class="text-[10px] text-zinc-400 mt-1">Maksimal 50 karakter. Otomatis huruf besar.</p>
                @error('code')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="type" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Tipe Potongan</label>
                <select name="type" id="type" 
                    class="w-full px-3 py-2 border border-zinc-200 bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 text-sm font-medium cursor-pointer @error('type') border-red-500 @enderror"
                    required>
                    <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Rupiah (Rp - Nominal Tetap)</option>
                    <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Persentase (% - Persen)</option>
                </select>
                @error('type')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Row 2: Value and Min Booking -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="value" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Nilai Potongan</label>
                <div class="relative rounded-md shadow-sm">
                    <div id="value-symbol-prefix" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400 font-semibold text-sm">
                        Rp
                    </div>
                    <input type="number" name="value" id="value" value="{{ old('value') }}" step="0.01" min="0.01"
                        class="w-full pl-9 pr-9 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 font-semibold placeholder-zinc-400 @error('value') border-red-500 @enderror"
                        required placeholder="15000">
                    <div id="value-symbol-suffix" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-zinc-400 font-bold text-sm hidden">
                        %
                    </div>
                </div>
                <p class="text-[10px] text-zinc-400 mt-1" id="value-helper-text">Masukkan nominal Rupiah (contoh: 20000 untuk Rp 20.000).</p>
                @error('value')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="min_booking_amount" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Minimal Pembelian (Booking)</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400 font-semibold text-sm">
                        Rp
                    </div>
                    <input type="number" name="min_booking_amount" id="min_booking_amount" value="{{ old('min_booking_amount', 0) }}" min="0" step="0.01"
                        class="w-full pl-9 pr-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 font-semibold placeholder-zinc-400 @error('min_booking_amount') border-red-500 @enderror"
                        required placeholder="0">
                </div>
                <p class="text-[10px] text-zinc-400 mt-1">Jumlah minimum biaya booking agar voucher ini dapat digunakan.</p>
                @error('min_booking_amount')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Row 3: Expiry and Limit -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="expires_at" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Masa Berlaku (Kedaluwarsa)</label>
                <input type="date" name="expires_at" id="expires_at" value="{{ old('expires_at') }}" min="{{ date('Y-m-d') }}"
                    class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 font-medium @error('expires_at') border-red-500 @enderror">
                <p class="text-[10px] text-zinc-400 mt-1">Kosongkan jika voucher berlaku selamanya.</p>
                @error('expires_at')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="usage_limit" class="block text-xs font-semibold uppercase tracking-wider text-zinc-500 mb-1.5">Batas Total Penggunaan</label>
                <input type="number" name="usage_limit" id="usage_limit" value="{{ old('usage_limit') }}" min="1"
                    class="w-full px-3 py-2 border border-zinc-200 rounded-md focus:outline-none focus:ring-2 focus:ring-zinc-950 focus:border-zinc-950 bg-white transition-all text-sm text-zinc-800 font-semibold placeholder-zinc-400 @error('usage_limit') border-red-500 @enderror"
                    placeholder="Contoh: 100">
                <p class="text-[10px] text-zinc-400 mt-1">Kosongkan jika penggunaan tidak dibatasi.</p>
                @error('usage_limit')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Row 4: Status Active -->
        <div class="flex items-center gap-3 border-t border-zinc-100 pt-4">
            <label class="relative inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked {{ old('is_active') == '0' ? '' : 'checked' }}>
                <div class="w-9 h-5 bg-zinc-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-zinc-900"></div>
                <span class="ml-3 text-xs font-semibold text-zinc-700">Aktifkan Voucher</span>
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 border-t border-zinc-100 pt-4">
            <button type="submit" class="px-4 py-2 bg-zinc-900 hover:bg-zinc-800 text-zinc-50 rounded-md text-sm font-medium transition-colors shadow">
                Simpan Voucher
            </button>
            <a href="{{ route('admin.vouchers.index') }}" class="px-4 py-2 border border-zinc-200 bg-white hover:bg-zinc-50 text-zinc-750 rounded-md text-sm font-medium transition-colors">
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
                valueInput.className = valueInput.className.replace('pl-9', 'pl-3');
                helperText.textContent = "Masukkan persentase diskon (contoh: 10 untuk 10%). Maksimal 100%.";
                valueInput.max = "100";
            } else {
                prefixSymbol.classList.remove('hidden');
                suffixSymbol.classList.add('hidden');
                valueInput.className = valueInput.className.replace('pl-3', 'pl-9');
                helperText.textContent = "Masukkan nominal Rupiah (contoh: 20000 untuk Rp 20.000).";
                valueInput.removeAttribute('max');
            }
        }
        
        typeSelect.addEventListener('change', updateSymbols);
        updateSymbols();
    });
</script>
@endsection
