@extends('layouts.app')

@section('title', 'Booking Status - Kwéla Beauty Studio')

@section('content')
<section class="py-16 bg-zinc-50/30 min-h-[70vh] flex items-center">
    <div class="max-w-xl mx-auto px-6 w-full text-center">
        
        <!-- Status Icon -->
        <div class="mb-6">
            @if($booking && $booking->status === 'confirmed')
                <div class="w-16 h-16 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-sm animate-bounce">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            @else
                <div class="w-16 h-16 bg-amber-50 border border-amber-100 text-amber-600 rounded-full flex items-center justify-center mx-auto shadow-sm">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            @endif
        </div>
        
        <!-- Status Message -->
        @if($booking && $booking->status === 'confirmed')
            <h1 class="text-2xl font-extrabold text-zinc-900 tracking-tight">Payment Confirmed!</h1>
            <p class="mt-2.5 text-sm text-zinc-550 leading-relaxed max-w-md mx-auto">
                Terima kasih, pembayaran Anda telah berhasil kami verifikasi. Jadwal kunjungan Anda telah dijadwalkan secara otomatis.
            </p>
        @else
            <h1 class="text-2xl font-extrabold text-zinc-900 tracking-tight">Booking Received!</h1>
            <p class="mt-2.5 text-sm text-zinc-550 leading-relaxed max-w-md mx-auto">
                Pesanan reservasi Anda telah kami terima dan saat ini sedang menunggu konfirmasi pembayaran.
            </p>
        @endif
        
        <!-- Dynamic Booking details Card -->
        @if($booking)
        <div class="mt-8 bg-white border border-zinc-200 rounded-lg shadow-sm text-left overflow-hidden">
            <!-- Header of card -->
            <div class="px-5 py-4 border-b border-zinc-150 bg-zinc-50/50 flex justify-between items-center">
                <span class="text-xs font-mono font-bold text-zinc-500">INVOICE NO: {{ $booking->invoice_number }}</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ $booking->status_badge_class }}">
                    {{ $booking->status }}
                </span>
            </div>

            <!-- Details list -->
            <div class="p-5 space-y-4 text-xs">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="block text-[10px] font-bold uppercase tracking-wider text-zinc-400">Customer</span>
                        <span class="font-bold text-zinc-800 text-sm mt-0.5 block">{{ $booking->customer_name }}</span>
                        <span class="text-zinc-500 font-medium block mt-0.5">{{ $booking->phone }}</span>
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold uppercase tracking-wider text-zinc-400">Schedule</span>
                        <span class="font-bold text-zinc-800 text-sm mt-0.5 block">{{ $booking->booking_date->format('d M Y') }}</span>
                        <span class="text-zinc-500 font-medium block mt-0.5">Pukul {{ $booking->booking_time }}</span>
                    </div>
                </div>

                <div class="border-t border-zinc-100 pt-3">
                    <span class="block text-[10px] font-bold uppercase tracking-wider text-zinc-400 mb-2">Selected Services</span>
                    <div class="space-y-1.5 font-medium text-zinc-650">
                        @foreach($booking->services as $service)
                        <div class="flex justify-between">
                            <span>{{ $service->name }}</span>
                            <span class="font-semibold text-zinc-800">{{ 'Rp ' . number_format($service->pivot->price, 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if($booking->discount_amount > 0)
                <div class="border-t border-zinc-100 pt-3 flex justify-between text-emerald-600 font-bold">
                    <span>Discount ({{ $booking->voucher_code }})</span>
                    <span>-{{ $booking->formatted_discount }}</span>
                </div>
                @endif

                <div class="border-t border-zinc-200/80 pt-3.5 flex justify-between items-center">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-zinc-800">Total</span>
                    <span class="text-base font-extrabold text-kwela-maroon">{{ $booking->formatted_total }}</span>
                </div>
            </div>
        </div>
        @endif
        
        <!-- Next steps or helpful instructions -->
        @if(!$booking || $booking->status !== 'confirmed')
        <div class="mt-6 p-5 bg-zinc-50 border border-zinc-200 rounded-lg text-left">
            <h3 class="font-bold text-kwela-maroon text-xs uppercase tracking-wider mb-2.5">What's Next?</h3>
            <ul class="text-xs text-zinc-500 space-y-2 font-medium">
                <li class="flex items-start gap-2">
                    <span class="text-zinc-400 font-bold">1.</span>
                    <span>Selesaikan transaksi Anda pada portal pembayaran Pakasir jika Anda dialihkan.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-zinc-400 font-bold">2.</span>
                    <span>Admin akan memverifikasi status pembayaran Anda secara berkala.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-zinc-400 font-bold">3.</span>
                    <span>Anda akan menerima notifikasi konfirmasi langsung melalui WhatsApp setelah pembayaran lunas.</span>
                </li>
            </ul>
        </div>
        @endif
        
        <!-- Back to Home Button -->
        <div class="mt-8">
            <a href="{{ route('home') }}" class="inline-block bg-kwela-maroon hover:bg-kwela-maroon/90 text-white px-8 py-3 rounded-md text-xs font-bold uppercase tracking-wider shadow-sm transition-colors">
                Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
