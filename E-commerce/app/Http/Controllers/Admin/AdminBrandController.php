<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view("admin.brand.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Assign slug before validation
        $request['slug'] = Str::slug($request['name']);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'slug' => 'required|unique:brands,slug', // Ensure slug is unique
        ]);

        $validator->validate();

        // Create the brand with the validated data
        Brand::create($request->only(['name', 'description', 'slug']));

        // Redirect to the brands index with a success message
        return redirect()->route('brands.index')->with('success', 'Marka başarıyla oluşturuldu.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view("admin.brand.edit", compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {

        $request['slug'] = Str::slug($request['name']);
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',

        ]);

        try {
            $brand->update([
                'name' => $request->name,
                'description' => $request->description,
                "slug" => $request['slug']
            ]);

            return redirect()->route('brands.index')->with('success', 'Marka başarıyla güncellendi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Marka güncellenirken bir hata oluştu: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if (!$brand) {
            return redirect()->route('categories.index')
                ->with('error', 'kategori bulunamadı');
        }
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'kategori başarıyla oluşturuldu.');
    }
}

//TODO:Tostr bildirimleri yapılacak 