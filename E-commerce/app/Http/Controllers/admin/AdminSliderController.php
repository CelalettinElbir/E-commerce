<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view("admin.slider.index", compact("sliders"));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Doğrulama kuralları
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Doğrulama başarısız olursa geri dön
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Dosyayı yükle ve kaydet
        if ($request->hasFile("image")) {
            $image = $request->file('image');
            $image_name = hexdec(uniqid())  . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(1200, 500);
            $image_resize->save(public_path('upload/sliders/' . $image_name));
        }

        // Yeni slider oluştur
        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $image_name,
        ]);

        // Yeni slider oluşturulduğunda kullanıcıyı ilgili yere yönlendir
        return redirect()->route('sliders.index')->with('success', 'Slider başarıyla oluşturuldu.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return "deneme";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
