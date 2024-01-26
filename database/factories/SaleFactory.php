<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();

        return [
            'product_id' => $product->id,
            'quantity' => rand(1, 10),
            'unit_cost' => $this->faker->randomFloat(2, 10, 100),
            'profit_margin' => $product->profit_margin,
            'shipping_cost' => config('app.default_shipping_cost'),
        ];
    }
}
