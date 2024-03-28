<?php

namespace App\Livewire\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{
    #[On('cart-item-saved')]
    public function render()
    {
        $cardCount = Cart::count();
        return view('livewire.cart.cart-counter', compact("cardCount"));
    }
}
