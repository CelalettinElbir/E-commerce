<?php

namespace App\Livewire\Cart;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CartList extends Component
{


    public function increaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        cart::update($rowId, $item->qty + 1);
    }


    public function decreaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        if ($item->qty - 1 > 0) {
            cart::update($rowId, $item->qty - 1);
        }
    }

    public function deleteItem($rowId)
    {
        Cart::remove($rowId);
    }


    public function render()
    {
        return view('livewire.cart.cart-list');
    }
}
