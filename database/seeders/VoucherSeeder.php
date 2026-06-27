<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voucher;
use Carbon\Carbon;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voucher::create([
            'code' => 'DISKON10',
            'type' => 'percent',
            'value' => 10,
            'min_booking_amount' => 0,
            'is_active' => true,
        ]);

        Voucher::create([
            'code' => 'POTONGAN25K',
            'type' => 'fixed',
            'value' => 25000,
            'min_booking_amount' => 100000,
            'is_active' => true,
        ]);

        Voucher::create([
            'code' => 'WELCOME50',
            'type' => 'percent',
            'value' => 50,
            'min_booking_amount' => 150000,
            'usage_limit' => 10,
            'expires_at' => Carbon::now()->addMonths(1),
            'is_active' => true,
        ]);
    }
}
