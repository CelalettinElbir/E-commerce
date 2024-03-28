<?php

namespace App\Livewire\Cart;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartAdd extends Component
{

    public $product;
    public function save($productId, $productName, $productImage, $productPrice, $brand)
    {
        Cart::add([
            'id' => $productId, 'name' => $productName,
            'qty' => 1, "price" => $productPrice,
            'options' => ["brand" => $brand, "image" => $productImage]
        ]);


        $notification = array(
            "message" => "Karta başarıyka eklendi.",
            "alert-type" => "error"
        );
        $this->dispatch("cart-item-saved");
        return redirect()->back()->with($notification);
    }

    public function render()
    {
        return view('livewire.cart.cart-add');
    }
}
