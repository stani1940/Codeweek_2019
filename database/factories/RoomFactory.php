<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'hotel_id' => Hotel::factory(),
            'type' => fake()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 50, 500),
            'image' => fake()->imageUrl(),
        ];
    }
}
