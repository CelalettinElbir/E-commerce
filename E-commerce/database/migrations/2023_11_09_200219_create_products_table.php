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
            $table->integer("stock");
            $table->integer("width");
            $table->integer("aspect_ratio");
            $table->integer("rim_diameter");
            $table->string('slug');
            $table->integer('quantity');
            $table->float("price");
            $table->float("discount_price");
            $table->string("description");
            $table->boolean("status")->default(1);
            $table->string("image");
            $table->integer("category");

            $table->timestamps();
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
