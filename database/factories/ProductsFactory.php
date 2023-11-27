<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'category' => fake()->word(),
            'price' => fake()->numberBetween(1, 99),
            'product_code' => str_pad(rand(pow(10, 9), pow(10, 10)-1), 10, '0', STR_PAD_LEFT),
            'description' => fake()->sentence(),
        ];
    }
}
