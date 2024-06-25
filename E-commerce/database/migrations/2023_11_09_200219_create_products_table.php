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
            $table->integer("stock_code"); //Tamam
            $table->integer("width"); //tamam
            $table->integer("aspect_ratio"); //Tamam
            $table->integer("rim_diameter"); //Tamam 
            $table->string('slug')->unique(); //
            $table->float("price");
            $table->float("discount_price")->nullable();
            $table->string("description");
            $table->boolean("status")->default(1);
            $table->string("image");
            $table->string("short_description");
            $table->unsignedBigInteger('brand_id'); // Yabancı anahtar: brand_id
            $table->unsignedBigInteger('category_id'); // Yabancı anahtar: category_id
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
