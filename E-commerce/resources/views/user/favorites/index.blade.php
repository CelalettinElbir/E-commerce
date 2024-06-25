@extends('layouts.user')



@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title mb-20">Favoriler</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->


    <!-- cart section start -->
    @if ($favoriteProducts->isEmpty())
        <section class="cart__section section--padding">
            <h3 style="text-align: center">Favori ürün bulunmamaktadır.</h3>

        </section>
    @else
        <section class="cart__section section--padding">
            <div class="container">
                <div class="cart__section--inner">
                    <h2 class="cart__title mb-30">Favoriler</h2>
                    <div class="cart__table">
                        <table class="cart__table--inner">
                            <thead class="cart__table--header">
                                <tr class="cart__table--header__items">
                                    <th class="cart__table--header__list">Ürünler</th>
                                    <th class="cart__table--header__list">Fiyat</th>
                                    <th class="cart__table--header__list text-center">Stok </th>
                                    <th class="cart__table--header__list text-right">Sepete Ekle</th>
                                </tr>
                            </thead>
                            <tbody class="cart__table--body">
                                @foreach ($favoriteProducts as $item)
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="cart__product d-flex align-items-center">
                                                <form method="POST" action="{{ route('user.favorite.destroy', $item) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="cart__remove--btn">X</button>
                                                </form>

                                                <div class="cart__thumbnail">
                                                    <a href="product-details.html">
                                                        <img class="border-radius-5"
                                                            src="{{ asset('upload/products/' . $item->image) }}"
                                                            alt="cart-product" width="200px">
                                                    </a>
                                                </div>
                                                <div class="cart__content">
                                                    <h3 class="cart__content--title h4"><a
                                                            href="product-details.html">{{ $item->name }}</a></h3>
                                                    <span class="cart__content--variant">{{ $item->stock_code }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">{{ $item->price }}</span>
                                        </td>
                                        <td class="cart__table--body__list text-center">
                                            <span class="in__stock text__secondary">in stock</span>
                                        </td>
                                        <td class="cart__table--body__list text-right">
                                            <a class="wishlist__cart--btn primary__btn" href="cart.html">Karta Ekle</a>
                                        </td>
                                    </tr>
                                @endforeach
    @endif

    </tbody>
    </table>
    <div class="continue__shopping d-flex justify-content-between">
        <a class="continue__shopping--link" href="index.html">Continue shopping</a>
        <a class="continue__shopping--clear" href="shop.html">View All Products</a>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- cart section end -->
@endsection
