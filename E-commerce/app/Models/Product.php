<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;
    // protected $fillable = [

    // ];

    protected $fillable = [
        'name', 'stock_code', 'aspect_ratio', 'width', 'rim_diameter',
        'stock', 'price', 'discount_price', 'description', 'status',
        'image', 'short_description', 'slug', "brand_id", "category_id"
    ];

    public function orderDetails()
    {
        return $this->hasMany(ShopOrderItem::class, 'product_id', 'id');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id');
    }




    public function scopeFilter($query, $request)
    {
        // Maksimum fiyat varsa ve boş değilse
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Minimum fiyat varsa ve boş değilse
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        // Marka filtresi varsa ve boş değilse
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->brands);
        }

        // Kategori filtresi varsa ve boş değilse
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        return $query;
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
