<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{

    public function definition(): array
    {
        return [
            'status' => fake()->boolean(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
