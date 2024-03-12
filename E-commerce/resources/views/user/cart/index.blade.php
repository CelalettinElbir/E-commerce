@extends('layouts.user')



@section('content')
    <section class="cart__section section--padding">
        <div class="container">
            <div class="cart__section--inner">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <h2 class="cart__title mb-30">Alışveriş Sepeti </h2>


                            @guest


                                @if (session()->has('shoppingCart') && !empty(session('shoppingCart')))
                                    {{-- Sepet dolu ise --}}


                                    {{-- @foreach (session()->get('shoppingCart') as $item)
                                    @endforeach --}}

                                    <div class="cart__table">
                                        <table class="cart__table--inner">
                                            <thead class="cart__table--header">
                                                <tr class="cart__table--header__items">
                                                    <th class="cart__table--header__list">Ürün</th>
                                                    <th class="cart__table--header__list">Fiyat</th>
                                                    <th class="cart__table--header__list">Miktar</th>
                                                    <th class="cart__table--header__list">Toplam</th>
                                                </tr>
                                            </thead>
                                            <tbody class="cart__table--body">


                                                @foreach (session()->get('shoppingCart') as $item)
                                                    <tr class="cart__table--body__items">
                                                        <td class="cart__table--body__list">
                                                            <div class="cart__product d-flex align-items-center">
                                                                <button class="cart__remove--btn" aria-label="search button"
                                                                    type="button">
                                                                    X
                                                                </button>
                                                                <div class="cart__thumbnail">
                                                                    <a href="product-details.html"><img class="border-radius-5"
                                                                            src="assets/img/product/small-product/product9.webp"
                                                                            alt="cart-product"></a>
                                                                </div>
                                                                <div class="cart__content">
                                                                    <h3 class="cart__content--title h4"><a
                                                                            href="product-details.html">{{$item["name"]}}</a>
                                                                    </h3>
                                                                    <span class="cart__content--variant"></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="cart__table--body__list">
                                                            <span class="cart__price">{{$item["price"]}}</span>
                                                        </td>
                                                        <td class="cart__table--body__list">
                                                            <div class="quantity__box">
                                                                <button type="button"
                                                                    class="quantity__value quickview__value--quantity decrease"
                                                                    aria-label="quantity value"
                                                                    value="Decrease Value">-</button>
                                                                <label>
                                                                    <input type="number"
                                                                        class="quantity__number quickview__value--number"
                                                                        value="1" data-counter />
                                                                </label>
                                                                <button type="button"
                                                                    class="quantity__value quickview__value--quantity increase"
                                                                    aria-label="quantity value"
                                                                    value="Increase Value">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="cart__table--body__list">
                                                            <span class="cart__price end">{{$item["amount"]}} * {{$item["price"]}} </span>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="continue__shopping d-flex justify-content-between">
                                            <a class="continue__shopping--link" href="shop.html">Alışverişe Deveam Et</a>
                                            <button class="continue__shopping--clear" type="submit">Kartı Temizle</button>
                                        </div>
                                    </div>




                                    {{-- Sepet içeriğini gösterme veya diğer işlemleri yapma --}}
                                @else
                                    {{-- Sepet boş ise --}}
                                    {{-- Boş sepet durumuna göre mesaj gösterme veya diğer işlemleri yapma --}}
                                @endif
                                <div class="cart__table">
                                    <table class="cart__table--inner">
                                        <thead class="cart__table--header">
                                            <tr class="cart__table--header__items">
                                                <th class="cart__table--header__list">Ürün</th>
                                                <th class="cart__table--header__list">Fiyat</th>
                                                <th class="cart__table--header__list">Miktar</th>
                                                <th class="cart__table--header__list">Toplam</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cart__table--body">

                                            <tr class="cart__table--body__items">
                                                <td class="cart__table--body__list">
                                                    <div class="cart__product d-flex align-items-center">
                                                        <button class="cart__remove--btn" aria-label="search button"
                                                            type="button">
                                                            X
                                                        </button>
                                                        <div class="cart__thumbnail">
                                                            <a href="product-details.html"><img class="border-radius-5"
                                                                    src="assets/img/product/small-product/product9.webp"
                                                                    alt="cart-product"></a>
                                                        </div>
                                                        <div class="cart__content">
                                                            <h3 class="cart__content--title h4"><a
                                                                    href="product-details.html">Fluids & Chemicals</a></h3>
                                                            <span class="cart__content--variant">COLOR: Blue</span>
                                                            <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span class="cart__price">£65.00</span>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <div class="quantity__box">
                                                        <button type="button"
                                                            class="quantity__value quickview__value--quantity decrease"
                                                            aria-label="quantity value" value="Decrease Value">-</button>
                                                        <label>
                                                            <input type="number"
                                                                class="quantity__number quickview__value--number" value="1"
                                                                data-counter />
                                                        </label>
                                                        <button type="button"
                                                            class="quantity__value quickview__value--quantity increase"
                                                            aria-label="quantity value" value="Increase Value">+</button>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span class="cart__price end">£130.00</span>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                    <div class="continue__shopping d-flex justify-content-between">
                                        <a class="continue__shopping--link" href="shop.html">Alışverişe Deveam Et</a>
                                        <button class="continue__shopping--clear" type="submit">Kartı Temizle</button>
                                    </div>
                                </div>

                            @endguest

                            @auth

                            @endauth


                            {{-- <div class="cart__table">
                                <table class="cart__table--inner">
                                    <thead class="cart__table--header">
                                        <tr class="cart__table--header__items">
                                            <th class="cart__table--header__list">Ürün</th>
                                            <th class="cart__table--header__list">Fiyat</th>
                                            <th class="cart__table--header__list">Miktar</th>
                                            <th class="cart__table--header__list">Toplam</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__table--body">

                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <button class="cart__remove--btn" aria-label="search button"
                                                        type="button">
                                                        X
                                                    </button>
                                                    <div class="cart__thumbnail">
                                                        <a href="product-details.html"><img class="border-radius-5"
                                                                src="assets/img/product/small-product/product9.webp"
                                                                alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h3 class="cart__content--title h4"><a
                                                                href="product-details.html">Fluids & Chemicals</a></h3>
                                                        <span class="cart__content--variant">COLOR: Blue</span>
                                                        <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">£65.00</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <div class="quantity__box">
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity decrease"
                                                        aria-label="quantity value" value="Decrease Value">-</button>
                                                    <label>
                                                        <input type="number"
                                                            class="quantity__number quickview__value--number"
                                                            value="1" data-counter />
                                                    </label>
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity increase"
                                                        aria-label="quantity value" value="Increase Value">+</button>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price end">£130.00</span>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="shop.html">Alışverişe Deveam Et</a>
                                    <button class="continue__shopping--clear" type="submit">Kartı Temizle</button>
                                </div>
                            </div> --}}
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
                </form>
            </div>
        </div>
    </section>
@endsection
