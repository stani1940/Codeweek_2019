<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = [
            [
                'user_id' => '1',
                'room_id' => 1,
                'num_of_guests' => 2,
                'arrival' => '2020-05-18',
                'departure' => '2020-05-28'
            ],
            [
                'user_id' => '1',
                'room_id' => 2,
                'num_of_guests' => 1,
                'arrival' => '2020-05-10',
                'departure' => '2020-05-12'
            ],
            [
                'user_id' => '1',
                'room_id' => 3,
                'num_of_guests' => 3,
                'arrival' => '2020-05-06',
                'departure' => '2020-05-07'
            ],
            [
                'user_id' => '1',
                'room_id' => 4,
                'num_of_guests' => 2,
                'arrival' => '2020-05-12',
                'departure' => '2020-05-15'
            ],
            [
                'user_id' => '1',
                'room_id' => 2,
                'num_of_guests' => 2,
                'arrival' => '2020-05-20',
                'departure' => '2020-05-24'
            ]
        ];

        foreach ($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}
