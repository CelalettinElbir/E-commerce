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
        if ($request->filled('brands')  && !empty(array_filter($request->brands))) {
            // dd($request->brands, !empty($request->brands), !$request->brands == "", !empty(array_filter($request->brands)));
            $query->whereIn('brand_id', $request->brands,);
        }

        // Kategori filtresi varsa ve boş değilse
        if ($request->filled('categories') && !empty(array_filter($request->categories))) {
            $query->whereIn('category_id', $request->categories);
        }

        // Genişlik filtresi varsa ve boş değilse
        if ($request->filled('width')) {
            $query->where('width', $request->width);
        }

        // Yanak Oranı filtresi varsa ve boş değilse
        if ($request->filled('aspect_ratio')) {
            $query->where('aspect_ratio', $request->aspect_ratio);
        }

        // Jant Çapı filtresi varsa ve boş değilse
        if ($request->filled('rim_diameter')) {
            $query->where('rim_diameter', $request->rim_diameter);
        }

        if ($request->has('discounted') && $request->discounted) {
            $query->whereNotNull('discount_price');
        }

        if ($request->has("sort")) {
            switch ($request->sort) {
                case 'latest':
                    $query->orderByDesc('created_at');
                    break;

                case 'newness':
                    $query->orderByDesc('created_at');
                    break;
                case 'price':
                    $query->orderBy('price');

                    break;
                case 'price-desc':
                    $query->orderByDesc('price');
                    break;
                case 'name':
                    $query->orderBy('name');
                    break;
                case 'name-desc':
                    $query->orderByDesc('name');
                    break;

                default:
                    $query->orderByDesc('created_at'); // Default sorting by latest
                    break;
            }
        } else {
            $query->orderByDesc('created_at'); // Default sorting by latest
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
