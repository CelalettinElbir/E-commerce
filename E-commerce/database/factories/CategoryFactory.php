<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'slug' => Str::slug($this->faker->word()),
        ];
    }

    public function yazlik(): Factory
    {
        return $this->state([
            'name' => 'Yazlık',
            'description' => 'Yaz sezonu için lastikler',
            'slug' => 'yazlik',
        ]);
    }

    public function kislik(): Factory
    {
        return $this->state([
            'name' => 'Kışlık',
            'description' => 'Kış sezonu için lastikler',
            'slug' => 'kislik',
        ]);
    }

    public function dortMevsim(): Factory
    {
        return $this->state([
            'name' => 'Dört Mevsim',
            'description' => 'Tüm sezonlar için lastikler',
            'slug' => 'dort-mevsim',
        ]);
    }
}
