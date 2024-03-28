<?php

namespace App\Livewire\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class IconCartList extends Component
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

    #[On('cart-item-saved')]
    public function render()
    {
        // dd(Cart::content());
        return view('livewire.cart.icon-cart-list', ['cartItems' => Cart::content(), "cartTotal" => Cart::total(), "cartSubTotal" => Cart::subTotal()]);
    }
}
