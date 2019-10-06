<?php

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = [
            [
                'name' => 'Hemus',
                'location' => 'Vraca',
                'description' => ' Luxurious hotel.',
                'image' => 'https://q-cf.bstatic.com/images/hotel/max1024x768/177/177875901.jpg'
            ],
            [
                'name' => 'Body M-Travel',
                'location' => 'Vraca',
                'description' => ' New hotel.',
                'image' => 'https://q-cf.bstatic.com/images/hotel/max1024x768/930/93023850.jpg'
            ],
            [
                'name' => 'Hotel Leva',
                'location' => 'Vraca',
                'description' => 'New luxurious hotel.',
                'image' => 'https://r-cf.bstatic.com/images/hotel/max1024x768/147/147985319.jpg'
            ]
        ];

        foreach ($hotels as $hotel) {
            Hotel::create(array(
                'name' => $hotel['name'],
                'location' => $hotel['location'],
                'description' => $hotel['description'],
                'image' => $hotel['image']
            ));
        }
    }
}
