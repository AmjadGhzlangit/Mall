<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'seller_id' => Seller::inRandomOrder()->first()->id,
            'total_amount' => $this->faker->numberBetween(0, 500),
            'total_quantity' => $this->faker->numberBetween(0, 500),
        ];
    }
}
