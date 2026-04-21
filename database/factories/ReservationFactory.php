<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'room_id' => Room::factory(),
            'num_of_guests' => fake()->numberBetween(1, 4),
            'arrival' => fake()->date(),
            'departure' => fake()->date(),
        ];
    }
}
