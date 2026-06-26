<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotions = [
            [
                'title' => 'Refer a Friend',
                'description' => 'Refer your friends and get 20% off your next service! Share the beauty experience with your loved ones.',
                'discount' => 20,
                'start_date' => now()->startOfYear(),
                'end_date' => now()->endOfYear(),
                'status' => 'active',
            ],
            [
                'title' => 'Treatment Promo',
                'description' => 'Get 30% off on all treatment services this month. Pamper yourself with our premium beauty treatments.',
                'discount' => 30,
                'start_date' => now()->startOfMonth(),
                'end_date' => now()->endOfMonth(),
                'status' => 'active',
            ],
        ];

        foreach ($promotions as $promotion) {
            Promotion::create($promotion);
        }
    }
}
