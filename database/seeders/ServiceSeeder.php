<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Haircut',
                'description' => 'Professional haircut styling with our experienced beauticians. Includes wash and blow dry.',
                'price' => 50000,
                'status' => 'active',
            ],
            [
                'name' => 'Eyelash Classic',
                'description' => 'Classic eyelash extension for a natural and elegant look. Makes your eyes appear more open and alluring.',
                'price' => 77000,
                'status' => 'active',
            ],
            [
                'name' => 'Lashlift',
                'description' => 'Perm your natural lashes to create a beautiful curl and lift. No extensions needed!',
                'price' => 50000,
                'status' => 'active',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
