<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $fillable = [

    // ];

    protected $fillable = [
        'name', 'stock_code', 'aspect_ratio', 'width', 'rim_diameter',
        'stock', 'price', 'discount_price', 'description', 'status',
        'image', 'short_description', 'slug',
    ];
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class);
    // }
}
