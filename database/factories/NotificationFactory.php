<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => fake()->sentence(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'sent_at' => fake()->dateTimeThisYear(),
        ];
    }
}
