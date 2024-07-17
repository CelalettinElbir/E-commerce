<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminBannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'required|image',
            'link' => 'required|url',
        ]);


        // Dosyayı yükle ve kaydet
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/banners/', $image_name);
            $image_path = 'upload/banners/' . $image_name;
        }
        Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $image_path,
            'link' => $request->link,
        ]);


        $notification = array(
            "message" => " başarıyla oluşturuldu.",
            "alert-type" => "success"

        );


        return redirect()->route('banners.index')->with($notification);
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'image',
            'link' => 'required|url',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('banners', 'public');
            $banner->update([
                'image_path' => $imagePath,
            ]);
        }

        $banner->update($request->only('title', 'description', 'link'));




        return redirect()->route('banners.index')->with(["message" => " Başarıyla Güncellendi.", "alert-type" => "success"]);
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image_path && file_exists(public_path($banner->image_path))) {
            unlink(public_path($banner->image_path));
        }

        $banner->delete();

        return redirect()->route('banners.index')->with(["message" => " Başarıyla Silindi.", "alert-type" => "success"]);
    }
}
