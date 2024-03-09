<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
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

    public function destroy(Favorite $favorite)
    {
        dd($favorite);
        if ($favorite != null) {
            $favorite->delete();
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

        return redirect()->route('user.favorites')->with($notification);
    }
}
