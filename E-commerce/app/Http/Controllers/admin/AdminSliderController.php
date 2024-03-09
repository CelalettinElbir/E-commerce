<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Doğrulama başarısız olursa geri dön
        if ($validator->fails()) {
            return "hata";
        }

        // Dosyayı yükle ve kaydet
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $image_name = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();

            // Resmi yüklemeden önce boyutunu değiştir
            $resized_image = Image::make($image)->resize(931, 553)->encode('webp');
            $resized_image->save("upload/slider/" . $image_name);
        }
        // Yeni slider oluştur
        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $image_name,
        ]);

        // Yeni slider oluşturulduğunda kullanıcıyı ilgili yere yönlendir
        return redirect()->route('slider.index')->with('success', 'Slider başarıyla oluşturuldu.');
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
        return view("admin.slider.edit", compact("slider"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Doğrulama başarısız olursa geri dön
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Slider öğesini güncelle
        $slider->title = $request->title;
        $slider->description = $request->description;

        // Eğer yeni bir resim yüklendi ise
        if ($request->hasFile('image')) {
            // Eski resmi sil
            if (file_exists(public_path("upload\slider\\" . $slider->slider_img))) {
                if (file_exists(public_path("upload\slider\\" . $slider->slider_img))) {
                    unlink(public_path("upload\slider\\" . $slider->slider_img));
                }
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/slider/' . $name_gen);
            $slider->slider_img =  $name_gen;
        }
        $slider->save();
        // Kullanıcıyı ilgili yere yönlendir
        return redirect()->route('slider.index')->with('success', 'Slider başarıyla güncellendi.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if (!$slider) {
            return redirect()->route('slider.index')
                ->with('error', 'kategori bulunamadı');
        }
        if (file_exists(public_path("upload\slider\\" . $slider->slider_img))) {
            if (file_exists(public_path("upload\slider\\" . $slider->slider_img))) {
                unlink(public_path("upload\slider\\" . $slider->slider_img));
            }
        }
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'kategori başarıyla oluşturuldu.');
    }
}
