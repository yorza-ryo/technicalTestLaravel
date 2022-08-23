<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => fake()->unique(true)->numberBetween(1, 10),
            'brand' => fake()->company(),
            'stock' => fake()->numberBetween(0, 100),
            'price' => fake()->numberBetween(100000, 1000000)
        ];
    }
}
