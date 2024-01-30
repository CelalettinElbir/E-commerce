<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view("admin.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $request["slug"] = Str::slug($request["name"]);
        $validator->validate();
        $category = Category::create($request->all());
        // Eğer product başarıyla oluşturulduysa, isteği uygun şekilde işleyebilirsiniz
        return redirect()->route('categories.index')->with('success', 'Ürün başarıyla oluşturuldu.');
    }
    /**
     * Display the specified resource.
     */
    // public function show(Category $category)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            "description" => 'required|string|max:255',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla güncellendi.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!$category) {
            return redirect()->route('categories.index')
                ->with('error', 'kategori bulunamadı');
        }
        $category->delete();

        return redirect()->route('Brad.index')->with('success', 'kategori başarıyla oluşturuldu.');
    }
}
