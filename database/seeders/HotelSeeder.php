<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'Hemus',
                'location' => 'Vraca',
                'description' => ' Luxurious hotel.',
                'image' => 'image/rade.jpg'
            ],
            [
                'name' => 'Body M-Travel',
                'location' => 'Vraca',
                'description' => ' New hotel.',
                'image' => 'image/rade_1.jpg'
            ],
            [
                'name' => 'Hotel Leva',
                'location' => 'Vraca',
                'description' => 'New luxurious hotel.',
                'image' => 'image/hotel_mira.jpg'
            ]
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
