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
        $products =  Product::latest()->get();
        return view("admin.product.index", compact("brands", "categories", "products"));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:products',
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
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $image_name = null;
            if ($request->hasFile("image")) {
                $image = $request->file("image");
                $image_name = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
                $image->move("upload/products/", $image_name);
            }
            $slug = Str::slug($request->name);
            Product::create([
                'name' => $request->name,
                'stock' => $request->stock,
                'stock_code' => $request->stock_code,
                'width' => $request->width,
                'aspect_ratio' => $request->aspect_ratio,
                'rim_diameter' => $request->rim_diameter,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $image_name,
                'short_description' => $request->short_description,
                'slug' => $slug,
            ]);
            return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla oluşturuldu.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ürün oluşturulurken bir hata oluştu: ' . $e->getMessage());
        }
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Ürün bulunamadı.');
        }

        return view('admin.product.edit', compact("product", "categories", "brands"));
    }

    public function update(Request $request, string $id)
    {

        $product = Product::find($id);
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

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $image_name = $product->image;

            if ($request->hasFile("image")) {
                $image = $request->file("image");
                $image_name = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
                $image->move("upload/products/", $image_name);
            }
            $slug = Str::slug($request->name);
            $product->update([
                'name' => $request->name,
                'stock' => $request->stock,
                'stock_code' => $request->stock_code,
                'width' => $request->width,
                'aspect_ratio' => $request->aspect_ratio,
                'rim_diameter' => $request->rim_diameter,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $image_name,
                'short_description' => $request->short_description,
                'slug' => $slug,
            ]);

            return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla güncellendi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ürün güncellenirken bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Ürün bulunamadı.');
        }
        try {
            $product->delete();
            return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla silindi.');
        } catch (\Exception $e) {
            return redirect()->route('admin.product.index')->with('error', 'Ürün silinirken bir hata oluştu: ' . $e->getMessage());
        }
    }
}
