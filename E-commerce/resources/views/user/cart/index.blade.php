@extends('layouts.user')



@section('content')
<section class="cart__section section--padding">
    <div class="container">
        <div class="cart__section--inner">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h2 class="cart__title mb-30">Alışveriş Sepeti </h2>

                    @livewire('cart.cart-list')
                    <div class="continue__shopping d-flex justify-content-between">
                        <a class="continue__shopping--link" href="{{route("shop.index")}}">Alışverişe Devam Et</a>

                        <form action="{{ route('cart.empty') }}" method="post">
                            @csrf
                            <button type="submit" class="continue__shopping--clear">Kartı Temizle</button>
                        </form>
                    </div>
                </div>





            </div>
            {{-- <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                                <div class="coupon__code mb-30">
                                    <h3 class="coupon__code--title">Coupon</h3>
                                    <p class="coupon__code--desc">Enter your coupon code if you have one.</p>
                                    <div class="coupon__code--field d-flex">
                                        <label>
                                            <input class="coupon__code--field__input border-radius-5"
                                                placeholder="Coupon code" type="text">
                                        </label>
                                        <button class="coupon__code--field__btn primary__btn" type="submit">Apply
                                            Coupon</button>
                                    </div>
                                </div>
                                <div class="cart__note mb-20">
                                    <h3 class="cart__note--title">Note</h3>
                                    <p class="cart__note--desc">Add special instructions for your seller...</p>
                                    <textarea class="cart__note--textarea border-radius-5"></textarea>
                                </div>
                                <div class="cart__summary--total mb-20">
                                    <table class="cart__summary--total__table">
                                        <tbody>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                <td class="cart__summary--amount text-right">$860.00</td>
                                            </tr>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                                <td class="cart__summary--amount text-right">$860.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart__summary--footer">
                                    <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                                    <ul class="d-flex justify-content-between">
                                        <li><button class="cart__summary--footer__btn primary__btn cart"
                                                type="submit">Update Cart</button></li>
                                        <li><a class="cart__summary--footer__btn primary__btn checkout"
                                                href="checkout.html">Check Out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
        </div>
    </div>
    </div>
</section>
@endsection