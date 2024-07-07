<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("user.cart.index");
    }



    // public function addToCart(int $productId)
    // {

    //     // get data from session (this equals Session::get(), use empty array as default)
    //     $shoppingCart = session('shoppingCart', []);
    //     if (isset($shoppingCart[$productId])) {
    //         // product is already in shopping cart, increment the amount
    //         $shoppingCart[$productId]['amount'] += 1;
    //     } else {
    //         // fetch the product and add 1 to the shopping cart
    //         $product = Product::findOrFail($productId);
    //         $shoppingCart[$productId] = [
    //             'productId' => $productId,
    //             'amount'    => 1,
    //             "image"     => $product->image,
    //             'brand' => $product->brand->name,
    //             'price'     => $product->price,
    //             'name'      => $product->name,
    //         ];
    //     }

    //     // update the session data (this equals Session::put() )
    //     session(['shoppingCart' => $shoppingCart]);

    //     return back()->with('success', 'Sepete Başarıyla Eklendi!');
    // }




    public function addToCart(Request $request, Product $product)
    {


        // Add the item to the cart
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => [
                'brand' => $product->brand->name,
                'image' => $product->image,
            ]
        ]);

        // Set up the notification message
        $notification = [
            'message' => 'Karta başarıyla eklendi.',
            'alert-type' => 'success' // Changed to 'success' for a more appropriate alert type
        ];

        // Redirect back with the notification
        return redirect()->back()->with($notification);
    }



    public function emptyCart(Request $request)
    {
        // Destroy all items in the cart
        Cart::destroy();

        // Set up the notification message
        $notification = [
            'message' => 'Kart başarıyla temizlendi.',
            'alert-type' => 'success'
        ];

        // Redirect back with the notification
        return redirect()->back()->with($notification);
    }



    public function deleteFromCart(Product $product)
    {
        $shoppingCart = session('shoppingCart', []);

        if (!isset($shoppingCart[$product->id])) {

            return null;
        } else {
            unset($shoppingCart[$product->id]);
        }

        session(['shoppingCart' => $shoppingCart]);



        return back()->with(['type' => 'succses', 'message' => 'Hata oluştu']);
    }


    //TODO: productları gönderirlen with brand ve with catregory ile gönderebilirsen daha az query olur



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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
