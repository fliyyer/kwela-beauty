<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Cancellation - Kwéla Beauty Studio</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #fcfaf9;
            color: #333333;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            background-color: #fcfaf9;
            padding: 40px 20px;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            border-top: 6px solid #b91c1c; /* Red border for cancellation */
        }
        .header {
            background-color: #b91c1c;
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 13px;
            opacity: 0.9;
        }
        .body {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 700;
            color: #111111;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .intro-text {
            font-size: 14px;
            line-height: 1.6;
            color: #555555;
            margin-bottom: 30px;
        }
        .details-card {
            background-color: #faf7f7;
            border: 1px solid #f2ecee;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
        }
        .details-header {
            font-size: 12px;
            font-weight: bold;
            color: #888888;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 15px;
            border-bottom: 1px solid #ebdbe0;
            padding-bottom: 8px;
        }
        .details-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }
        .details-label {
            color: #666666;
            font-weight: 500;
        }
        .details-value {
            color: #111111;
            font-weight: 700;
            text-align: right;
        }
        .services-list {
            margin-top: 20px;
            border-top: 1px dashed #ebdbe0;
            padding-top: 15px;
        }
        .service-item {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            margin-bottom: 8px;
            color: #555555;
        }
        .footer {
            padding: 30px;
            text-align: center;
            font-size: 12px;
            color: #888888;
            line-height: 1.6;
            border-top: 1px solid #f2ecee;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer a {
            color: #b91c1c;
            text-decoration: none;
            font-weight: bold;
        }
        @media (max-width: 480px) {
            .body {
                padding: 25px 20px;
            }
            .details-row {
                flex-direction: column;
            }
            .details-value {
                text-align: left;
                margin-top: 2px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <!-- Header -->
            <div class="header">
                <h1>Kwéla Studio</h1>
                <p>Reservasi Dibatalkan</p>
            </div>
            
            <!-- Body -->
            <div class="body">
                <div class="greeting">Halo, {{ $booking->customer_name }}!</div>
                <div class="intro-text">
                    Reservasi jadwal perawatan Anda di Kwéla Beauty Studio telah <strong>Dibatalkan</strong>. Berikut adalah rincian reservasi yang dibatalkan:
                </div>
                
                <!-- Details Card -->
                <div class="details-card">
                    <div class="details-header">Rincian Reservasi</div>
                    
                    <div class="details-row">
                        <span class="details-label">No. Invoice</span>
                        <span class="details-value">{{ $booking->invoice_number }}</span>
                    </div>
                    <div class="details-row">
                        <span class="details-label">Tanggal Kunjungan</span>
                        <span class="details-value">{{ $booking->booking_date->format('d M Y') }}</span>
                    </div>
                    <div class="details-row">
                        <span class="details-label">Waktu</span>
                        <span class="details-value">Pukul {{ $booking->booking_time }}</span>
                    </div>
                    <div class="details-row">
                        <span class="details-label">No. Telepon</span>
                        <span class="details-value">{{ $booking->phone }}</span>
                    </div>
                    
                    <!-- Services -->
                    <div class="services-list">
                        <div class="details-header" style="border:none; margin-bottom: 8px; padding:0;">Layanan Terpilih</div>
                        @foreach($booking->services as $service)
                        <div class="service-item">
                            <span>{{ $service->name }}</span>
                            <span style="font-weight: 600;">{{ 'Rp ' . number_format($service->pivot->price, 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="intro-text" style="margin-bottom: 0;">
                    Jika Anda merasa ini adalah kesalahan atau ingin menjadwalkan ulang perawatan baru, silakan lakukan reservasi kembali melalui website kami atau hubungi tim customer service kami.
                </div>
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <p><strong>Kwéla Beauty Studio</strong></p>
                <p>Bila ada pertanyaan, hubungi kami di <a href="https://wa.me/628123456789">WhatsApp CS kami</a>.</p>
                <p style="margin-top: 15px; font-size: 11px; color: #b5a4a9;">Pesan ini dikirimkan secara otomatis oleh sistem reservasi online Kwéla Beauty Studio.</p>
            </div>
        </div>
    </div>
</body>
</html>
