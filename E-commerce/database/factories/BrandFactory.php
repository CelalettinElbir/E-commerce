<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'slug' => Str::slug($this->faker->company()),
        ];
    }

    public function michelin(): Factory
    {
        return $this->state([
            'name' => 'Michelin',
            'description' => 'Dünyaca ünlü lastik markası.',
            'slug' => 'michelin',
        ]);
    }

    public function bridgestone(): Factory
    {
        return $this->state([
            'name' => 'Bridgestone',
            'description' => 'Japon lastik üreticisi.',
            'slug' => 'bridgestone',
        ]);
    }

    public function goodyear(): Factory
    {
        return $this->state([
            'name' => 'Goodyear',
            'description' => 'Amerikan lastik markası.',
            'slug' => 'goodyear',
        ]);
    }
}

