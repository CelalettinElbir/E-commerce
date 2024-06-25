<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::latest()->filter(request())->with("brand")->paginate(10);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view("user.shop.index", compact("products", "brands", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $category = $request->input('category');
        $searchQuery = $request->input('query');

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        // Kategori ve başlık (title) bazında filtreleme yap
        $products = Product::with('category', "brand")->when($category, function ($query, $category) {
            return $query->where('category_id', $category);
        })
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where('title', 'LIKE', "%{$searchQuery}%");
            })
            ->filter(request())->paginate(10);
        return view('user.shop.search', compact('products', "categories", "brands"));
    }



    public function sliderSearch(Request $request)
    {

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        $brand = $request->input('brand');
        $category = $request->input('category');
        $width = $request->input('width');
        $aspectRatio = $request->input('aspect_ratio');
        $rimDiameter = $request->input('rim_diameter');

        $filteredProducts = Product::query();
        // Tüm filtreleme kriterlerinin boş olup olmadığını kontrol et
        if ($brand || $category || $width || $aspectRatio || $rimDiameter) {
            // Filtreleme kriterleri dolu olduğunda filtreleme işlemini gerçekleştir
            

            if ($brand &&  $brand != 0) {
                $filteredProducts->where('brand_id', $brand);
            }

            if ($category && $brand != 0) {
                $filteredProducts->where('category_id', $category);
            }

            if ($width) {
                $filteredProducts->where('width', $width);
            }

            if ($aspectRatio) {
                $filteredProducts->where('aspect_ratio', $aspectRatio);
            }

            if ($rimDiameter) {
                $filteredProducts->where('rim_diameter', $rimDiameter);
            }

            $products = $filteredProducts->with("brand")->paginate(10);

            // Filtrelenmiş ürünleri kullanıcıya göster
            return view('user.shop.search', compact('products', "categories", "brands"));
        } else {
            $products = $filteredProducts->with("brand")->paginate(10);
            return view('user.shop.search', compact('products', "categories", "brands"));
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //  dd($product);
        // $products = Product::latest()->filter(request())->paginate(1);

        return view("user.shop.detail", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
