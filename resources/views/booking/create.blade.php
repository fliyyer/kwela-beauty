@extends('layouts.app')

@section('title', 'Book Appointment - Kwéla Beauty Studio')

@section('content')
<!-- Header Section with Immersive Editorial Aesthetic (Matching Services & Promotions) -->
<section class="relative py-28 md:py-36 bg-stone-950 text-white overflow-hidden">
    <!-- Background Image with sophisticated dark warm overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1560066984-1389b4cda4f1?auto=format&fit=crop&q=80&w=2000" 
             alt="Luxury Beauty Treatment Studio" 
             class="w-full h-full object-cover object-center opacity-25 select-none animate-fade-in">
        <!-- Cinematic dark gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-stone-950 via-stone-950/95 to-stone-900/40"></div>
        <!-- Warm glowing ambient lights -->
        <div class="absolute top-1/4 -left-24 w-96 h-96 bg-[#5d3a3a]/40 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute -bottom-24 right-1/4 w-[500px] h-[500px] bg-stone-100/10 rounded-full blur-[100px] pointer-events-none"></div>
    </div>

    <!-- Content Layout -->
    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Left Side: Editorial Typography -->
        <div class="lg:col-span-8 space-y-6 text-left">
            <div class="inline-flex items-center gap-2 bg-[#5d3a3a]/40 border border-[#5d3a3a]/60 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-[0.25em] text-stone-200">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                Secure Priority Slot
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold leading-[1.1] text-white" style="font-family: 'Playfair Display', serif;">
                Book Your <br>
                <span class="text-stone-300 italic font-light">Beauty Ritual</span>
            </h1>
            
            <p class="text-stone-300 text-base md:text-lg max-w-2xl leading-relaxed font-light">
                Mulailah perjalanan transformasi kecantikan Anda bersama para ahli kami. Isi detail reservasi di bawah ini untuk mengamankan slot prioritas Anda di <strong class="font-medium text-white">Kwéla Beauty Studio</strong>.
            </p>
        </div>

        <!-- Glassmorphic Accent Box (Right Side) -->
        <div class="lg:col-span-4 hidden lg:block">
            <div class="border border-white/10 bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] space-y-4 shadow-2xl relative">
                <span class="text-[10px] font-bold tracking-[0.2em] text-amber-400 uppercase block">Instant Reservation</span>
                <h3 class="text-xl font-bold text-white leading-snug">Guaranteed Quality</h3>
                <p class="text-stone-300 text-xs leading-relaxed font-light">
                    Sistem otomatis kami akan langsung mencatat reservasi Anda. Nikmati konsultasi personal pra-treatment gratis di setiap sesi.
                </p>
                <div class="absolute -top-4 -right-4 w-12 h-12 bg-[#5d3a3a] rounded-2xl flex items-center justify-center shadow-lg border border-white/10">
                    ✨
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
<section class="py-24 bg-stone-50">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        
        <!-- Booking Form Container -->
        <form action="{{ route('booking.store') }}" method="POST" class="bg-white rounded-[2.5rem] shadow-xl hover:shadow-2xl transition-shadow duration-500 p-8 md:p-14 border border-stone-100 relative overflow-hidden">
            @csrf
            
            <!-- Elegant subtle background vector overlay inside the card -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-bl from-[#5d3a3a]/5 to-transparent rounded-full blur-3xl pointer-events-none"></div>
            
            <!-- Step 1: Customer Information -->
            <div class="mb-14 relative z-10">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-10 h-10 rounded-2xl bg-[#5d3a3a]/10 text-[#5d3a3a] flex items-center justify-center font-bold text-base shadow-sm">
                        01
                    </span>
                    <div>
                        <h2 class="text-2xl font-bold text-stone-900" style="font-family: 'Playfair Display', serif;">Customer Information</h2>
                        <p class="text-stone-400 text-xs mt-0.5">Beritahu kami cara menghubungi Anda untuk konfirmasi jadwal</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="customer_name" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Full Name</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" 
                            class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-medium @error('customer_name') border-red-500 @enderror"
                            required placeholder="Jane Doe">
                        @error('customer_name')
                        <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                            class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-medium @error('email') border-red-500 @enderror"
                            required placeholder="jane@example.com">
                        @error('email')
                        <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">WhatsApp Number</label>
                    <div class="relative rounded-2xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-stone-400 text-sm font-semibold">🇮🇩</span>
                        </div>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                            class="w-full pl-12 pr-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-medium @error('phone') border-red-500 @enderror"
                            placeholder="0812xxxxxxx" required>
                    </div>
                    @error('phone')
                    <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Step 2: Appointment Details -->
            <div class="mb-14 relative z-10 border-t border-stone-100 pt-10">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-10 h-10 rounded-2xl bg-[#5d3a3a]/10 text-[#5d3a3a] flex items-center justify-center font-bold text-base shadow-sm">
                        02
                    </span>
                    <div>
                        <h2 class="text-2xl font-bold text-stone-900" style="font-family: 'Playfair Display', serif;">Appointment Details</h2>
                        <p class="text-stone-400 text-xs mt-0.5">Tentukan tanggal dan jam kunjungan terbaik untuk Anda</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="booking_date" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Date</label>
                        <input type="date" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" 
                            min="{{ date('Y-m-d') }}"
                            class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-medium @error('booking_date') border-red-500 @enderror"
                            required>
                        @error('booking_date')
                        <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="booking_time" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Time</label>
                        <select name="booking_time" id="booking_time" 
                            class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 font-medium cursor-pointer @error('booking_time') border-red-500 @enderror"
                            required>
                            <option value="">Select a time</option>
                            @foreach(['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'] as $time)
                                <option value="{{ $time }}" {{ old('booking_time') == $time ? 'selected' : '' }}>{{ $time }}</option>
                            @endforeach
                        </select>
                        @error('booking_time')
                        <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Step 3: Services Selection -->
            <div class="mb-14 relative z-10 border-t border-stone-100 pt-10">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-10 h-10 rounded-2xl bg-[#5d3a3a]/10 text-[#5d3a3a] flex items-center justify-center font-bold text-base shadow-sm">
                        03
                    </span>
                    <div>
                        <h2 class="text-2xl font-bold text-stone-900" style="font-family: 'Playfair Display', serif;">Select Services</h2>
                        <p class="text-stone-400 text-xs mt-0.5">Pilih satu atau lebih perawatan eksklusif yang Anda butuhkan</p>
                    </div>
                </div>

                @error('services')
                <p class="mt-1.5 text-xs text-red-500 font-medium mb-4">{{ $message }}</p>
                @enderror
                @error('services.*')
                <p class="mt-1.5 text-xs text-red-500 font-medium mb-4">{{ $message }}</p>
                @enderror
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($services as $service)
                    <label class="group relative flex items-start p-5 bg-white border border-stone-200 rounded-[1.5rem] cursor-pointer hover:border-[#5d3a3a] hover:bg-[#5d3a3a]/5 transition-all duration-300 shadow-sm hover:shadow-md">
                        <div class="flex items-center h-5 mt-1">
                            <input type="checkbox" name="services[]" value="{{ $service->id }}" 
                                class="w-5 h-5 text-[#5d3a3a] border-stone-300 rounded focus:ring-[#5d3a3a] accent-[#5d3a3a]"
                                {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                        </div>
                        <div class="ml-4">
                            <span class="block font-bold text-stone-800 group-hover:text-[#5d3a3a] transition-colors duration-300 text-sm md:text-base">
                                {{ $service->name }}
                            </span>
                            <span class="block text-xs uppercase tracking-wider text-stone-400 mt-1">Investment</span>
                            <span class="block font-bold text-[#5d3a3a] text-sm mt-0.5">{{ $service->formatted_price }}</span>
                        </div>
                    </label>
                    @empty
                    <div class="col-span-full text-center py-12 bg-stone-50 rounded-2xl border border-dashed border-stone-200">
                        <svg class="w-12 h-12 text-stone-300 mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        <p class="text-stone-500 text-sm font-semibold">No services available right now.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Step 4: Price Summary & Voucher -->
            <div class="mb-14 relative z-10 border-t border-stone-100 pt-10">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-10 h-10 rounded-2xl bg-[#5d3a3a]/10 text-[#5d3a3a] flex items-center justify-center font-bold text-base shadow-sm">
                        04
                    </span>
                    <div>
                        <h2 class="text-2xl font-bold text-stone-900" style="font-family: 'Playfair Display', serif;">Voucher & Summary</h2>
                        <p class="text-stone-400 text-xs mt-0.5">Gunakan kode voucher dan periksa rincian biaya Anda</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                    <!-- Voucher Input -->
                    <div class="md:col-span-6 space-y-4">
                        <div>
                            <label for="voucher_input" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Kode Voucher</label>
                            <div class="flex gap-2">
                                <input type="text" id="voucher_input" 
                                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-mono font-bold uppercase"
                                    placeholder="CONTOH: DISKON10" style="text-transform: uppercase;">
                                <button type="button" id="apply_voucher_btn"
                                    class="px-6 py-4 bg-stone-900 hover:bg-[#5d3a3a] text-white rounded-2xl font-bold text-xs uppercase tracking-wider transition-all duration-300 shadow-md">
                                    Apply
                                </button>
                            </div>
                            <div id="voucher_message" class="mt-2 text-xs font-semibold hidden"></div>
                            <!-- Hidden input to submit with form -->
                            <input type="hidden" name="voucher_code" id="voucher_code_hidden" value="{{ old('voucher_code') }}">
                        </div>
                    </div>

                    <!-- Price Summary Details -->
                    <div class="md:col-span-6 bg-stone-50 border border-stone-200/60 p-6 rounded-[2rem] space-y-4">
                        <h3 class="text-sm font-bold text-stone-800 uppercase tracking-wider border-b border-stone-200/60 pb-2">Rincian Pembayaran</h3>
                        
                        <div class="space-y-2 text-sm text-stone-600 font-medium">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span id="summary_subtotal" class="font-bold text-stone-800">Rp 0</span>
                            </div>
                            <div id="summary_discount_row" class="flex justify-between text-emerald-600 hidden font-semibold">
                                <span>Diskon (<span id="applied_code_label"></span>)</span>
                                <span>-<span id="summary_discount">Rp 0</span></span>
                            </div>
                            <div class="border-t border-stone-200/60 pt-3 flex justify-between text-stone-900 font-extrabold text-base">
                                <span>Total Akhir</span>
                                <span id="summary_total" class="text-[#5d3a3a] text-lg">Rp 0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Notes -->
            <div class="mb-12 relative z-10 border-t border-stone-100 pt-10">
                <label for="notes" class="block text-xs font-bold uppercase tracking-wider text-stone-500 mb-2">Special Requests (Optional)</label>
                <textarea name="notes" id="notes" rows="4" 
                    class="w-full px-5 py-4 border border-stone-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#5d3a3a]/20 focus:border-[#5d3a3a] bg-stone-50/50 hover:bg-stone-50/20 focus:bg-white transition-all text-stone-800 placeholder-stone-400 font-medium"
                    placeholder="Contoh: Beritahu kami jika Anda memiliki kondisi kulit sensitif atau permintaan khusus gaya potongan rambut...">{{ old('notes') }}</textarea>
            </div>

            <!-- Submit Button Area -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6 border-t border-stone-100 pt-8 relative z-10">
                <div class="flex items-center gap-3 text-stone-400">
                    <svg class="w-5 h-5 text-[#5d3a3a]/80" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider">Instant WhatsApp Confirmation</span>
                </div>
                
                <button type="submit" class="w-full sm:w-auto px-10 py-5 bg-[#5d3a3a] hover:bg-stone-900 text-white rounded-full font-bold shadow-lg hover:shadow-xl hover:scale-[1.03] active:scale-95 transition-all duration-300 border border-[#5d3a3a] text-center tracking-wider uppercase text-xs">
                    Confirm & Submit Booking
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const servicePrices = @json($services->pluck('price', 'id')->map(fn($p) => (float)$p));
        const checkboxes = document.querySelectorAll('input[name="services[]"]');
        const voucherInput = document.getElementById('voucher_input');
        const applyVoucherBtn = document.getElementById('apply_voucher_btn');
        const voucherMessage = document.getElementById('voucher_message');
        const voucherCodeHidden = document.getElementById('voucher_code_hidden');
        
        const summarySubtotal = document.getElementById('summary_subtotal');
        const summaryDiscountRow = document.getElementById('summary_discount_row');
        const appliedCodeLabel = document.getElementById('applied_code_label');
        const summaryDiscount = document.getElementById('summary_discount');
        const summaryTotal = document.getElementById('summary_total');

        function formatRupiah(amount) {
            return 'Rp ' + new Intl.NumberFormat('id-ID', { minimumFractionDigits: 0 }).format(amount);
        }

        function getSelectedServiceIds() {
            const selected = [];
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    selected.push(parseInt(cb.value));
                }
            });
            return selected;
        }

        function getSelectedSubtotal(selectedIds) {
            let total = 0;
            selectedIds.forEach(id => {
                if (servicePrices[id]) {
                    total += servicePrices[id];
                }
            });
            return total;
        }

        function updateSummary() {
            const selectedIds = getSelectedServiceIds();
            const subtotal = getSelectedSubtotal(selectedIds);
            
            // Update Subtotal UI
            summarySubtotal.textContent = formatRupiah(subtotal);

            // If no services selected, reset everything
            if (selectedIds.length === 0) {
                summaryDiscountRow.classList.add('hidden');
                summaryTotal.textContent = formatRupiah(0);
                voucherCodeHidden.value = '';
                voucherMessage.classList.add('hidden');
                voucherMessage.textContent = '';
                applyVoucherBtn.disabled = true;
                applyVoucherBtn.classList.add('opacity-50', 'cursor-not-allowed');
                return;
            }

            applyVoucherBtn.disabled = false;
            applyVoucherBtn.classList.remove('opacity-50', 'cursor-not-allowed');

            const appliedCode = voucherCodeHidden.value;
            if (appliedCode) {
                // If a voucher is applied, validate/recalculate it
                applyVoucherAjax(appliedCode, selectedIds, false);
            } else {
                // No voucher, total is subtotal
                summaryDiscountRow.classList.add('hidden');
                summaryTotal.textContent = formatRupiah(subtotal);
            }
        }

        function applyVoucherAjax(code, serviceIds, isManualClick = false) {
            applyVoucherBtn.disabled = true;
            applyVoucherBtn.textContent = 'Applying...';

            fetch("{{ route('booking.applyVoucher') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    voucher_code: code,
                    service_ids: serviceIds
                })
            })
            .then(response => response.json())
            .then(data => {
                applyVoucherBtn.disabled = false;
                applyVoucherBtn.textContent = 'Apply';

                if (data.valid) {
                    // Update hidden code
                    voucherCodeHidden.value = data.voucher_code;
                    
                    // Show success status
                    voucherMessage.className = "mt-2 text-xs font-semibold text-emerald-600";
                    voucherMessage.textContent = data.message;
                    voucherMessage.classList.remove('hidden');

                    // Show Discount in Summary
                    appliedCodeLabel.textContent = data.voucher_code;
                    summaryDiscount.textContent = data.formatted_discount;
                    summaryDiscountRow.classList.remove('hidden');

                    // Update Final Total
                    summaryTotal.textContent = data.formatted_final_total;
                } else {
                    // If user manually clicked apply, show error
                    if (isManualClick || code === voucherCodeHidden.value) {
                        voucherCodeHidden.value = '';
                        voucherMessage.className = "mt-2 text-xs font-semibold text-rose-500";
                        voucherMessage.textContent = data.message;
                        voucherMessage.classList.remove('hidden');

                        summaryDiscountRow.classList.add('hidden');
                        
                        const subtotal = getSelectedSubtotal(serviceIds);
                        summaryTotal.textContent = formatRupiah(subtotal);
                    }
                }
            })
            .catch(err => {
                console.error(err);
                applyVoucherBtn.disabled = false;
                applyVoucherBtn.textContent = 'Apply';
                if (isManualClick) {
                    voucherMessage.className = "mt-2 text-xs font-semibold text-rose-500";
                    voucherMessage.textContent = "Terjadi kesalahan koneksi. Silakan coba lagi.";
                    voucherMessage.classList.remove('hidden');
                }
            });
        }

        // Checkbox event listeners
        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateSummary);
        });

        // Apply voucher button listener
        applyVoucherBtn.addEventListener('click', function() {
            const code = voucherInput.value.trim();
            const selectedIds = getSelectedServiceIds();

            if (selectedIds.length === 0) {
                voucherMessage.className = "mt-2 text-xs font-semibold text-rose-500";
                voucherMessage.textContent = "Silakan pilih minimal satu layanan terlebih dahulu.";
                voucherMessage.classList.remove('hidden');
                return;
            }

            if (!code) {
                voucherMessage.className = "mt-2 text-xs font-semibold text-rose-500";
                voucherMessage.textContent = "Silakan masukkan kode voucher.";
                voucherMessage.classList.remove('hidden');
                return;
            }

            applyVoucherAjax(code, selectedIds, true);
        });

        // Initialize on load
        updateSummary();
    });
</script>
@endsection