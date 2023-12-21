<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product' => Product::inRandomOrder()->first()->id,
            'price' => $this->faker->numberBetween(0, 500),
            'quantity' => $this->faker->numberBetween(0, 500),
        ];
    }
}
