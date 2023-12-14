<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.category.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'description' => 'required',
            ]);
            $request["slug"] = Str::slug($request["name"]);
            $validator->validate();
            $category = Category::create($request->all());
            // Eğer product başarıyla oluşturulduysa, isteği uygun şekilde işleyebilirsiniz
            return redirect()->route('categories.index')->with('success', 'Ürün başarıyla oluşturuldu.');
        } catch (\Exception $e) {
            return  $e->getMessage();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
