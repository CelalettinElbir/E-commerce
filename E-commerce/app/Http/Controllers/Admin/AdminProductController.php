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
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:products',
            'stock' => 'required|integer|min:0',
            'width' => 'required|integer|min:0',
            'aspect_ratio' => 'required|integer|min:0',
            'rim_diameter' => 'required|integer|min:0',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'discount_price' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'fuel_consumption' => 'required|in:A,B,C,D,E',
            'grip' => 'required|in:A,B,C,D,E',
            'noise_level' => 'required|integer|min:0',
            'production_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'description' => 'nullable',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'short_description' => 'nullable',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'stock_code' => 'nullable|string|unique:products,stock_code', // Stok kodu ekleme
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {

            $stock_code = $request->stock_code ?? $this->generateStockCode(); // Stok kodu varsa kullan, yoksa oluştur
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
                'stock_code' => $stock_code,
                'width' => $request->width,
                'aspect_ratio' => $request->aspect_ratio,
                'rim_diameter' => $request->rim_diameter,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'fuel_consumption' => $request->fuel_consumption,
                'grip' => $request->grip,
                'noise_level' => $request->noise_level,
                'production_year' => $request->production_year,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $image_name,
                'short_description' => $request->short_description,
                'slug' => $slug,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
            ]);
            $notification = [
                "message" => "Ürün başarıyla oluşturuldu.",
                "alert-type" => "success"
            ];

            return redirect()->route('admin.product.index')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                "message" => $e->getMessage(),
                "alert-type" => "success"
            ];
            return redirect()->back()->with($notification);
        }
    }


    protected function generateStockCode(): string
    {
        return strtoupper(Str::random(3) . random_int(1000, 9999));
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

    public function update(Request $request, $id)
{

    // Validasyon kuralları
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255|unique:products,name,' . $id,
        'stock' => 'required|integer|min:0',
        'width' => 'required|integer|min:0',
        'aspect_ratio' => 'required|integer|min:0',
        'rim_diameter' => 'required|integer|min:0',
        'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
        'discount_price' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
        'fuel_consumption' => 'required|in:A,B,C,D,E',
        'grip' => 'required|in:A,B,C,D,E',
        'noise_level' => 'required|integer|min:0',
        'production_year' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
        'description' => 'nullable',
        'status' => 'required|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'short_description' => 'nullable',
        'brand_id' => 'required|integer|exists:brands,id',
        'category_id' => 'required|integer|exists:categories,id',
        'stock_code' => 'nullable|string|unique:products,stock_code,' . $id, // Stok kodu kontrolü
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        $product = Product::findOrFail($id);
        $status = $request->has('status') ? 1 : 0;
        // Resim yükleme işlemi
        $image_name = $product->image;
        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path('upload/products/' . $product->image))) {
                unlink(public_path('upload/products/' . $product->image)); // Eski resmi siler
            }
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/products'), $image_name);
        }


        $slug = Str::slug($request->name);
        // Ürün güncelleme
        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'stock_code' => $request->stock_code ?? $product->stock_code, // Stok kodu varsa kullan, yoksa mevcut olanı kullan
            'width' => $request->width,
            'aspect_ratio' => $request->aspect_ratio,
            'rim_diameter' => $request->rim_diameter,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'fuel_consumption' => $request->fuel_consumption,
            'grip' => $request->grip,
            'noise_level' => $request->noise_level,
            'production_year' => $request->production_year,
            'description' => $request->description,
            'status' =>  $status ,
            'image' => $image_name,
            'short_description' => $request->short_description,
            'slug' => $slug,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);
    
        $notification = [
            "message" => "Ürün başarıyla güncellendi.",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.product.index')->with($notification);
    } catch (\Exception $e) {
        $notification = [
            "message" => $e,
            "alert-type" => "error"
        ];

        return redirect()->back()->with($notification);
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
