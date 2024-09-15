<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer("stock"); //Tamam 
            $table->string("stock_code")->unique(); 
            $table->integer("width"); //tamam
            $table->integer("aspect_ratio"); //Tamam
            $table->integer("rim_diameter"); //Tamam 
            $table->string('slug')->unique(); //
            $table->string("description");
            $table->boolean("status")->default(1);
            $table->string("image")->nullable();
            $table->string("short_description");
            $table->enum('fuel_consumption', ['A', 'B', 'C', 'D', 'E'])->nullable(); // Yakıt tüketimi seçenekleri
            $table->enum('grip', ['A', 'B', 'C', 'D', 'E'])->nullable(); // Yol tutuşu seçenekleri
            $table->integer('noise_level')->nullable(); // Gürültü Seviyesi (dB)
            $table->year('production_year')->nullable(); // Üretim Yılı
            $table->unsignedBigInteger('brand_id'); // Yabancı anahtar: brand_id
            $table->unsignedBigInteger('category_id'); // Yabancı anahtar: category_id
            $table->decimal('price', 10, 2);  // Aynı yapı
            $table->decimal('discount_price', 10, 2)->nullable();  // Aynı yapı
            $table->timestamps();
            // Yabancı anahtar kısıtlamaları
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
