<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

use function Laravel\Prompts\alert;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view("admin.product.index", compact("brands", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view("admin.product.create", compact("brands", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'stock' => 'required|integer|min:0',
                'stock_code' => 'required',
                'width' => 'required|integer|min:0',
                'aspect_ratio' => 'required|integer|min:0',
                'rim_diameter' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0',
                'description' => 'nullable',
                'status' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'short_description' => 'nullable',
            ]);

            $image = $request->file("image");
            $image_name = hexdec(uniqid()) . " " . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save("upload/products/" . $image_name);
            $request["slug"] = Str::slug($request["name"]);
            $validator->validate();
            $product = Product::create($request->all());
            $product->save();
            // Eğer product başarıyla oluşturulduysa, isteği uygun şekilde işleyebilirsiniz
            return redirect()->route('admin.products.index')->with('success', 'Ürün başarıyla oluşturuldu.');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during image processing or database save
            return "ahata " . $e->getMessage();
        }



        // Eğer doğrulama başarısız olursa, hata mesajlarını göster
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
