<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();


        User::create([
            'name' => 'Celaettin',
            'email' => 'celallelbir@hotmail.com',
            'password' => '$2y$12$RL.VaVqFX1wx0yN4cixt/OdGQZG1qqeUAPn84xObFN/BHqfofpiT.',
            'role' => 1, // Admin rolünü belirtiyoruz
        ]);

        Category::factory()->yazlik()->create();
        Category::factory()->kislik()->create();
        Category::factory()->dortMevsim()->create();
        Brand::factory()->michelin()->create();
        Brand::factory()->bridgestone()->create();
        Brand::factory()->goodyear()->create();
       

        Product::factory(100);



    }
}
