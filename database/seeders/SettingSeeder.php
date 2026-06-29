<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'whatsapp',
                'value' => '085126485450',
            ],
            [
                'key' => 'instagram',
                'value' => '@kwela_beautystudio',
            ],
            [
                'key' => 'address',
                'value' => 'Kwela Beauty Studio',
            ],
            [
                'key' => 'maps_link',
                'value' => 'https://maps.google.com/?q=-6.200000,106.816666',
            ],
            [
                'key' => 'booking_start_time',
                'value' => '10:00',
            ],
            [
                'key' => 'booking_end_time',
                'value' => '17:00',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
