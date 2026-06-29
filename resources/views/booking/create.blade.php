@extends('layouts.app')

@section('title', 'Book Appointment - Kwéla Beauty Studio')

@section('content')
<!-- Header Section with Immersive Editorial Aesthetic -->
<section class="relative py-20 md:py-24 bg-zinc-950 text-white overflow-hidden border-b border-zinc-900">
    <!-- Background Image with sophisticated dark warm overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/header-hero.png') }}" 
             alt="Kwéla Beauty Studio Header" 
             class="w-full h-full object-cover object-center opacity-25 select-none">
        <!-- Cinematic dark gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-zinc-950 via-zinc-950/95 to-zinc-900/40"></div>
        <!-- Glow blurs -->
        <div class="absolute top-1/4 -left-24 w-96 h-96 bg-zinc-800/20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute -bottom-24 right-1/4 w-[500px] h-[500px] bg-zinc-900/30 rounded-full blur-[100px] pointer-events-none"></div>
    </div>

    <!-- Content Layout -->
    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Left Side: Editorial Typography -->
        <div class="lg:col-span-8 space-y-6 text-left">
            <div class="inline-flex items-center gap-2 bg-zinc-900 border border-zinc-800 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-[0.25em] text-zinc-300">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Secure Priority Slot
            </div>
            
            <h1 class="text-5xl md:text-6xl font-extrabold leading-[1.1] text-white tracking-tight">
                Book Your <br>
                <span class="text-zinc-400 italic font-light">Beauty Ritual</span>
            </h1>
            
            <p class="text-zinc-450 text-sm md:text-base max-w-2xl leading-relaxed font-light">
                Mulailah perjalanan transformasi kecantikan Anda bersama para ahli kami. Isi detail reservasi di bawah ini untuk mengamankan slot prioritas Anda di <strong class="font-medium text-white">Kwéla Beauty Studio</strong>.
            </p>
        </div>

        <!-- Glassmorphic Accent Box (Right Side) -->
        <div class="lg:col-span-4 hidden lg:block">
            <div class="border border-zinc-800 bg-zinc-900/60 backdrop-blur-md p-6 rounded-lg space-y-3 shadow-2xl relative">
                <span class="text-[9px] font-bold tracking-[0.2em] text-zinc-400 uppercase block">Instant Reservation</span>
                <h3 class="text-lg font-bold text-white leading-snug">Guaranteed Quality</h3>
                <p class="text-zinc-400 text-xs leading-relaxed font-light">
                    Sistem otomatis kami akan langsung mencatat reservasi Anda. Nikmati konsultasi personal pra-treatment gratis di setiap sesi.
                </p>
                <div class="absolute -top-3 -right-3 w-10 h-10 bg-zinc-900 border border-zinc-800 rounded-lg flex items-center justify-center shadow-lg">
                    ✨
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
<section class="py-20 bg-zinc-50/50">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        
        <!-- Booking Form Container -->
        <form action="{{ route('booking.store') }}" method="POST" class="bg-white rounded-lg shadow-sm p-6 md:p-10 border border-zinc-200 relative overflow-hidden">
            @csrf
            
            <!-- Step 1: Customer Information -->
            <div class="mb-10 relative z-10">
                <div class="flex items-center gap-3.5 mb-6">
                    <span class="w-8 h-8 rounded bg-kwela-maroon/10 text-kwela-maroon flex items-center justify-center font-bold text-sm shadow-sm border border-kwela-maroon/20">
                        01
                    </span>
                    <div>
                        <h2 class="text-lg font-bold text-zinc-900">Customer Information</h2>
                        <p class="text-zinc-450 text-[11px] mt-0.5">Beritahu kami cara menghubungi Anda untuk konfirmasi jadwal</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="customer_name" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455 mb-1.5">Full Name</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" 
                            class="w-full px-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all placeholder-zinc-400 font-medium @error('customer_name') border-red-500 @enderror"
                            required placeholder="Jane Doe">
                        @error('customer_name')
                        <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455 mb-1.5">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                            class="w-full px-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all placeholder-zinc-400 font-medium @error('email') border-red-500 @enderror"
                            required placeholder="jane@example.com">
                        @error('email')
                        <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="phone" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455 mb-1.5">WhatsApp Number</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-xs">
                            <span class="text-zinc-400 font-semibold select-none">🇮🇩</span>
                        </div>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                            class="w-full pl-10 pr-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all placeholder-zinc-400 font-medium @error('phone') border-red-500 @enderror"
                            placeholder="0812xxxxxxx" required>
                    </div>
                    @error('phone')
                    <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Step 2: Appointment Details -->
            <div class="mb-10 relative z-10 border-t border-zinc-100 pt-8">
                <div class="flex items-center gap-3.5 mb-6">
                    <span class="w-8 h-8 rounded bg-kwela-maroon/10 text-kwela-maroon flex items-center justify-center font-bold text-sm shadow-sm border border-kwela-maroon/20">
                        02
                    </span>
                    <div>
                        <h2 class="text-lg font-bold text-zinc-900">Appointment Details</h2>
                        <p class="text-zinc-450 text-[11px] mt-0.5">Tentukan tanggal dan jam kunjungan terbaik untuk Anda</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="booking_date" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455 mb-1.5">Date</label>
                        <input type="date" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" 
                            min="{{ date('Y-m-d') }}"
                            class="w-full px-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all font-medium @error('booking_date') border-red-500 @enderror"
                            required>
                        @error('booking_date')
                        <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="booking_time" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455 mb-1.5">Time</label>
                        <select name="booking_time" id="booking_time" 
                            class="w-full px-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all font-medium cursor-pointer @error('booking_time') border-red-500 @enderror"
                            required>
                            <option value="">Select a time</option>
                            @foreach($times as $time)
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
            <div class="mb-10 relative z-10 border-t border-zinc-100 pt-8">
                <div class="flex items-center gap-3.5 mb-6">
                    <span class="w-8 h-8 rounded bg-kwela-maroon/10 text-kwela-maroon flex items-center justify-center font-bold text-sm shadow-sm border border-kwela-maroon/20">
                        03
                    </span>
                    <div>
                        <h2 class="text-lg font-bold text-zinc-900">Select Services</h2>
                        <p class="text-zinc-450 text-[11px] mt-0.5">Pilih satu atau lebih perawatan eksklusif yang Anda butuhkan</p>
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
                    <label class="group relative flex items-start p-4 bg-white border border-zinc-200 rounded-lg cursor-pointer hover:border-kwela-maroon hover:bg-kwela-maroon/5 transition-all duration-200 shadow-sm">
                        <div class="flex items-center h-5 mt-0.5">
                            <input type="checkbox" name="services[]" value="{{ $service->id }}" 
                                class="w-4 h-4 text-kwela-maroon border-zinc-300 rounded focus:ring-kwela-maroon focus:ring-offset-0 focus:ring-0 accent-kwela-maroon cursor-pointer"
                                {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3">
                            <span class="block font-bold text-zinc-800 group-hover:text-kwela-maroon transition-colors duration-200 text-xs md:text-sm">
                                {{ $service->name }}
                            </span>
                            @if($service->has_discount)
                                <div class="flex items-baseline gap-1 mt-0.5">
                                    <span class="block font-bold text-kwela-maroon text-xs">{{ $service->formatted_discounted_price }}</span>
                                    <span class="text-[10px] text-zinc-400 line-through font-medium">{{ $service->formatted_original_price }}</span>
                                </div>
                                <span class="inline-flex items-center px-1 py-0.5 rounded text-[8px] font-bold bg-rose-50 text-rose-700 border border-rose-100/50 mt-0.5">
                                    {{ $service->discount_label }}
                                </span>
                            @else
                                <span class="block font-bold text-kwela-maroon text-xs mt-0.5">{{ $service->formatted_price }}</span>
                            @endif
                        </div>
                    </label>
                    @empty
                    <div class="col-span-full text-center py-8 bg-zinc-50 rounded-md border border-dashed border-zinc-200">
                        <svg class="w-10 h-10 text-zinc-300 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        <p class="text-zinc-500 text-xs font-semibold">No services available right now.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Step 4: Price Summary & Voucher -->
            <div class="mb-10 relative z-10 border-t border-zinc-100 pt-8">
                <div class="flex items-center gap-3.5 mb-6">
                    <span class="w-8 h-8 rounded bg-kwela-maroon/10 text-kwela-maroon flex items-center justify-center font-bold text-sm shadow-sm border border-kwela-maroon/20">
                        04
                    </span>
                    <div>
                        <h2 class="text-lg font-bold text-zinc-900">Voucher & Summary</h2>
                        <p class="text-zinc-450 text-[11px] mt-0.5">Gunakan kode voucher dan periksa rincian biaya Anda</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                    <!-- Voucher Input -->
                    <div class="md:col-span-6 space-y-4">
                        <div>
                            <label for="voucher_input" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455 mb-1.5">Kode Voucher</label>
                            <div class="flex gap-2">
                                <input type="text" id="voucher_input" 
                                    class="w-full px-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all placeholder-zinc-400 font-mono font-bold uppercase"
                                    placeholder="CONTOH: DISKON10" style="text-transform: uppercase;">
                                <button type="button" id="apply_voucher_btn"
                                    class="px-4 py-2.5 bg-kwela-maroon hover:bg-kwela-maroon/90 text-white rounded-md font-bold text-xs uppercase tracking-wider transition-colors shadow-sm">
                                    Apply
                                </button>
                            </div>
                            <div id="voucher_message" class="mt-2 text-xs font-semibold hidden"></div>
                            <!-- Hidden input to submit with form -->
                            <input type="hidden" name="voucher_code" id="voucher_code_hidden" value="{{ old('voucher_code') }}">
                        </div>
                    </div>

                    <!-- Price Summary Details -->
                    <div class="md:col-span-6 bg-zinc-50 border border-zinc-200 p-5 rounded-lg space-y-3 shadow-sm">
                        <h3 class="text-xs font-bold text-zinc-800 uppercase tracking-wider border-b border-zinc-250/60 pb-1.5">Rincian Pembayaran</h3>
                        
                        <div class="space-y-1.5 text-xs text-zinc-550 font-medium">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span id="summary_subtotal" class="font-bold text-zinc-900">Rp 0</span>
                            </div>
                            <div id="summary_services_list" class="space-y-1.5 pl-3 border-l-2 border-zinc-250/80 py-1 text-zinc-500 text-[11px] hidden my-2.5">
                                <!-- Filled by Javascript -->
                            </div>
                            <div id="summary_discount_row" class="flex justify-between text-emerald-600 hidden font-semibold">
                                <span>Diskon (<span id="applied_code_label"></span>)</span>
                                <span>-<span id="summary_discount">Rp 0</span></span>
                            </div>
                            <div class="border-t border-zinc-200/60 pt-2.5 flex justify-between text-zinc-900 font-extrabold text-sm">
                                <span>Total Akhir</span>
                                <span id="summary_total" class="text-kwela-maroon text-base">Rp 0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Notes -->
            <div class="mb-10 relative z-10 border-t border-zinc-100 pt-8">
                <label for="notes" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455 mb-1.5">Special Requests (Optional)</label>
                <textarea name="notes" id="notes" rows="3" 
                    class="w-full px-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all placeholder-zinc-400 font-medium"
                    placeholder="Contoh: Beritahu kami jika Anda memiliki kondisi kulit sensitif atau permintaan khusus..."></textarea>
            </div>

            <!-- Submit Button Area -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-zinc-100 pt-6 relative z-10">
                <div class="flex items-center gap-2 text-kwela-maroon/90">
                    <svg class="w-4 h-4 text-kwela-maroon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-kwela-maroon/90">Instant WhatsApp Confirmation</span>
                </div>
                
                <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-kwela-maroon hover:bg-kwela-maroon/90 text-white rounded-md font-bold shadow-sm transition-colors text-xs tracking-wider uppercase text-center">
                    Confirm & Submit Booking
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const servicePrices = @json($services->pluck('discounted_price', 'id')->map(fn($p) => (float)$p));
        const serviceNames = @json($services->pluck('name', 'id'));
        const checkboxes = document.querySelectorAll('input[name="services[]"]');
        const voucherInput = document.getElementById('voucher_input');
        const applyVoucherBtn = document.getElementById('apply_voucher_btn');
        const voucherMessage = document.getElementById('voucher_message');
        const voucherCodeHidden = document.getElementById('voucher_code_hidden');
        
        const summarySubtotal = document.getElementById('summary_subtotal');
        const summaryServicesList = document.getElementById('summary_services_list');
        const summaryDiscountRow = document.getElementById('summary_discount_row');
        const appliedCodeLabel = document.getElementById('applied_code_label');
        const summaryDiscount = document.getElementById('summary_discount');
        const summaryTotal = document.getElementById('summary_total');
        
        const dateInput = document.getElementById('booking_date');
        const timeSelect = document.getElementById('booking_time');

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

            // Update detailed services list
            summaryServicesList.innerHTML = '';
            if (selectedIds.length > 0) {
                selectedIds.forEach(id => {
                    if (servicePrices[id] !== undefined) {
                        const div = document.createElement('div');
                        div.className = 'flex justify-between font-normal text-zinc-500';
                        div.innerHTML = `<span>• ${serviceNames[id]}</span><span>${formatRupiah(servicePrices[id])}</span>`;
                        summaryServicesList.appendChild(div);
                    }
                });
                summaryServicesList.classList.remove('hidden');
            } else {
                summaryServicesList.classList.add('hidden');
            }

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

        // Checkbox event listeners (Maximum 2 Limit)
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function(e) {
                const selectedIds = getSelectedServiceIds();
                if (selectedIds.length > 2) {
                    this.checked = false;
                    alert('Maksimal memilih 2 layanan per reservasi.');
                    return;
                }
                updateSummary();
            });
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

        // AJAX dynamic time slots disable handler
        function fetchBookedTimes() {
            const selectedDate = dateInput.value;
            if (!selectedDate) {
                Array.from(timeSelect.options).forEach(opt => {
                    opt.disabled = false;
                    if (opt.value) {
                        opt.textContent = opt.value;
                    }
                });
                return;
            }

            fetch(`{{ route('booking.checkBookedTimes') }}?date=${selectedDate}`)
                .then(res => res.json())
                .then(bookedTimes => {
                    Array.from(timeSelect.options).forEach(opt => {
                        if (!opt.value) return;
                        
                        const isBooked = bookedTimes.includes(opt.value);
                        if (isBooked) {
                            opt.disabled = true;
                            opt.textContent = `${opt.value} (Sudah dipesan)`;
                            if (timeSelect.value === opt.value) {
                                timeSelect.value = '';
                            }
                        } else {
                            opt.disabled = false;
                            opt.textContent = opt.value;
                        }
                    });
                })
                .catch(err => {
                    console.error('Failed to check booked times:', err);
                });
        }

        dateInput.addEventListener('change', fetchBookedTimes);

        // Initialize on load
        updateSummary();
    });
</script>
@endsection