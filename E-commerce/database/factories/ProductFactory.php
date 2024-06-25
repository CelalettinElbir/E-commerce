<?php

namespace Database\Factories;

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
            'name' => $this->faker->sentence,
            'stock_code' => $this->faker->unique()->randomFloat(2, 10, 1000),
            'aspect_ratio' => $this->faker->randomFloat(2, 1.5, 2.5),
            'width' => $this->faker->numberBetween(100, 300),
            'rim_diameter' => $this->faker->numberBetween(10, 20),
            'stock' => $this->faker->numberBetween(0, 1000),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'discount_price' => $this->faker->optional(0.3)->randomFloat(2, 5, 800),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([0, 1]),
            'image' => "1789511266588593.jpg",
            'short_description' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'brand_id' => $this->faker->randomElement([1, 2]),
            'category_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
