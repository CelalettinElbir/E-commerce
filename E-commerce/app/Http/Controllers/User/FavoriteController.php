<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function favorites()
    {
        $favoriteProducts =  auth()->user()->favoriteProducts;
        if ($favoriteProducts) {

            return view("user.favorites.index", compact("favoriteProducts"));
        }
    }

    public function destroy(Product $product)
    {

        if ($product != null) {
            Favorite::where("user_id", request()->user()->id)->where("product_id", $product->id)->delete();

            $notification = array(
                "message" => "Öğe başarıyla silindi.",
                "alert-type" => "success"
            );
        } else {
            $notification = array(
                "message" => "Öğe silinemedi. Bir hata oluştu.",
                "alert-type" => "error"
            );
        }

        return back()->with($notification);
    }




    public function store(Request $request, Product $product)
    {

        try {
            // Favori oluştur
            $favorite = new Favorite();
            $favorite->user_id = $request->user()->id;
            $favorite->product_id = $product->id;
            $favorite->save();

            $notification = [
                "message" => "Favorilere başarıyla eklendi",
                "alert-type" => "success"
            ];

            // Başarıyla favori eklendiğine dair mesaj gönder

            return redirect()->back()->with($notification);
        } catch (\Exception $e) {

            $notification = [
                "message" => "Bilinmeyen Bir Hata Oluştu.",
                "alert-type" => "error"
            ];

            // Favori eklenirken bir hata oluşursa hata mesajı gönder
            return redirect()->back()->with($notification);
        }
    }
}
