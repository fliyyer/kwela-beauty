<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    /**
     * Send booking confirmation via Email and WhatsApp (if configured).
     *
     * @param Booking $booking
     * @return void
     */
    public static function sendBookingConfirmation(Booking $booking)
    {
        // 1. Send Email via Resend API
        try {
            $html = view('emails.booking_confirmed', compact('booking'))->render();
            $subject = 'Konfirmasi Reservasi ' . $booking->invoice_number . ' - Kwéla Beauty Studio';
            self::sendEmailViaResend($booking->email, $subject, $html);
        } catch (\Exception $e) {
            Log::error('Email Confirmation failed for booking ' . $booking->id . ': ' . $e->getMessage());
        }

        // 2. Send WhatsApp
        $apiKey = env('WHATSAPP_API_KEY');
        if (empty($apiKey) || $apiKey === 'YOUR_KEY') {
            Log::info('WhatsApp key not configured, skipping WA notification.');
            return;
        }

        $servicesList = $booking->services->pluck('name')->implode(', ');
        $formattedPrice = 'Rp ' . number_format($booking->total_price, 0, ',', '.');
        $dateStr = $booking->booking_date->format('d M Y');

        $message = "Halo {$booking->customer_name},\n\nPEMBAYARAN RESERVASI TERKONFIRMASI! 🎉\n\nPembayaran Anda telah berhasil kami terima. Jadwal perawatan Anda di Kwéla Beauty Studio kini telah terkonfirmasi secara otomatis.\n\nDetail Reservasi:\n- No. Invoice: {$booking->invoice_number}\n- Layanan: {$servicesList}\n- Tanggal: {$dateStr}\n- Jam: {$booking->booking_time}\n- Total: {$formattedPrice}\n\nKami tidak sabar untuk menyambut kehadiran Anda! Sampai jumpa di studio kami. ✨";

        self::sendWhatsApp($booking->phone, $booking->customer_name, $message, $apiKey);
    }

    /**
     * Send booking cancellation via Email and WhatsApp (if configured).
     *
     * @param Booking $booking
     * @return void
     */
    public static function sendBookingCancellation(Booking $booking)
    {
        // 1. Send Email via Resend API
        try {
            $html = view('emails.booking_cancelled', compact('booking'))->render();
            $subject = 'Pembatalan Reservasi ' . $booking->invoice_number . ' - Kwéla Beauty Studio';
            self::sendEmailViaResend($booking->email, $subject, $html);
        } catch (\Exception $e) {
            Log::error('Email Cancellation failed for booking ' . $booking->id . ': ' . $e->getMessage());
        }

        // 2. Send WhatsApp
        $apiKey = env('WHATSAPP_API_KEY');
        if (empty($apiKey) || $apiKey === 'YOUR_KEY') {
            Log::info('WhatsApp key not configured, skipping WA notification.');
            return;
        }

        $servicesList = $booking->services->pluck('name')->implode(', ');
        $dateStr = $booking->booking_date->format('d M Y');

        $message = "Halo {$booking->customer_name},\n\nKami ingin memberitahukan bahwa reservasi Anda di Kwéla Beauty Studio telah DIBATALKAN. ❌\n\nDetail Reservasi yang Dibatalkan:\n- No. Invoice: {$booking->invoice_number}\n- Layanan: {$servicesList}\n- Tanggal: {$dateStr}\n- Jam: {$booking->booking_time}\n\nJika Anda merasa ini adalah kesalahan atau ingin menjadwalkan ulang perawatan baru, silakan lakukan reservasi kembali melalui website kami atau hubungi WhatsApp CS kami. Terima kasih.";

        self::sendWhatsApp($booking->phone, $booking->customer_name, $message, $apiKey);
    }

    /**
     * Send Email via Resend HTTP API.
     *
     * @param string $to
     * @param string $subject
     * @param string $htmlContent
     * @return bool
     */
    public static function sendEmailViaResend(string $to, string $subject, string $htmlContent): bool
    {
        $apiKey = env('RESEND_API_KEY') ?: env('MAIL_PASSWORD');
        $from = env('MAIL_FROM_ADDRESS') ?: 'booking@kwelabeautystudio.com';
        $fromName = env('MAIL_FROM_NAME') ?: 'Kwéla Beauty Studio';

        if (empty($apiKey)) {
            Log::error('Resend API Key is not configured.');
            return false;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.resend.com/emails', [
                'from' => "{$fromName} <{$from}>",
                'to' => [$to],
                'subject' => $subject,
                'html' => $htmlContent,
            ]);

            if ($response->successful()) {
                Log::info("Email successfully sent to {$to} via Resend HTTP API.");
                return true;
            } else {
                Log::error("Failed to send email to {$to} via Resend HTTP API: " . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Resend HTTP API connection error when sending email: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Send WhatsApp notification via external API.
     *
     * @param string $phone
     * @param string $recipientName
     * @param string $message
     * @param string $apiKey
     * @return bool
     */
    public static function sendWhatsApp(string $phone, string $recipientName, string $message, string $apiKey): bool
    {
        $formattedPhone = self::formatPhoneNumber($phone);

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-api-key' => $apiKey
            ])->post('https://notify.disneyparisairporttransfer.com/api/push', [
                'to' => $formattedPhone,
                'recipientName' => $recipientName,
                'message' => $message
            ]);

            if ($response->successful()) {
                Log::info('WhatsApp notification successfully sent to ' . $formattedPhone);
                return true;
            } else {
                Log::error('WhatsApp notification failed: ' . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error('WhatsApp notification connection error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Format Indonesian phone numbers into international format (e.g. +628...)
     *
     * @param string $phone
     * @return string
     */
    private static function formatPhoneNumber(string $phone): string
    {
        // Remove non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // If it starts with 0, replace with 62
        if (strpos($phone, '0') === 0) {
            $phone = '62' . substr($phone, 1);
        }
        
        // Ensure prepended '+'
        if (strpos($phone, '+') !== 0) {
            $phone = '+' . $phone;
        }
        
        return $phone;
    }
}
