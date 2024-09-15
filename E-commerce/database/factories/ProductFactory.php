<?php

namespace Database\Factories;

use App\Models\Brand;
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
            'name' => $this->faker->words(3, true),  // Ürün ismini 3 kelimeden oluştur
            'stock_code' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{4}'),  // Rastgele ve eşsiz stok kodu
            'aspect_ratio' => $this->faker->numberBetween(30, 80),  // 30 ile 80 arasında rastgele aspect ratio
            'width' => $this->faker->numberBetween(155, 325),  // 155 ile 325 arasında rastgele genişlik
            'rim_diameter' => $this->faker->numberBetween(13, 22),  // 13 ile 22 inç arasında rastgele jant çapı
            'stock' => $this->faker->numberBetween(0, 1000),  // 0 ile 1000 arasında rastgele stok miktarı
            'price' => $this->faker->randomFloat(1, 1000, 2000), // 50 ile 2000 arasında iki ondalık basamaklı rastgele fiyat
            'discount_price' => $this->faker->optional(0.3)->randomFloat(2, 20, 1500), // %30 ihtimalle iki ondalık basamaklı rastgele indirimli fiyat
            'fuel_consumption' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),  // Rastgele yakıt tüketimi
            'grip' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),  // Rastgele yol tutuşu
            'noise_level' => $this->faker->numberBetween(65, 75),  // 65 ile 75 dB arasında rastgele gürültü seviyesi
            'production_year' => $this->faker->year,  // Rastgele üretim yılı
            'description' => $this->faker->sentence,  // Ürün açıklaması
            'status' => $this->faker->boolean,  // Ürün durumu (aktif/pasif)
            'image' => "default.jpg",  // Varsayılan resim
            'short_description' => $this->faker->sentence,  // Kısa açıklama
            'slug' => $this->faker->slug,  // Ürün slug
            'brand_id' => Brand::inRandomOrder()->first()->id,  // Rastgele bir markayı seç
            'category_id' => Category::inRandomOrder()->first()->id,  // Rastgele bir kategoriyi seç
        ];
    }
}
