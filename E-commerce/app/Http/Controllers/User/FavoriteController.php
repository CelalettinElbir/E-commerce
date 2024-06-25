<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use function PHPSTORM_META\type;

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
            // Check if the user has already added this product to favorites
            $existingFavorite = Favorite::where('user_id', $request->user()->id)
                ->where('product_id', $product->id)
                ->first();

            if ($existingFavorite) {
                // If the product is already in favorites, return an error response
                if ($request->wantsJson()) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Bu ürün zaten favorilerinizde!'
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Bu ürün zaten favorilerinizde!');
                }
            }

            // Create a new favorite
            $favorite = new Favorite();
            $favorite->user_id = $request->user()->id;
            $favorite->product_id = $product->id;
            $favorite->save();

            // Return success response
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Favorilere başarıyla eklendi.'
                ]);
            } else {

                $notification = array(
                    "message" => "Öğe başarıyla Favorilere Eklendi.",
                    "alert-type" => "success"
                );


                return redirect()->back()->with($notification);
            }
        } catch (\Exception $e) {
            // Return error response if an exception occurs
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Bilinmeyen bir hata oluştu.'
                ], 500); // HTTP status code 500 for internal server error
            } else {

                $notification = array(
                    "message" => "Bilinmeyen Bir Hata Oluştu ",
                    "alert-type" => "error"
                );


                return redirect()->back()->with($notification);
            }
        }
    }
}
