<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'category_id' => Category::inRandomOrder()->first()->id,
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(0, 500),
            'quantity' => $this->faker->numberBetween(0, 500),
        ];
    }
}
