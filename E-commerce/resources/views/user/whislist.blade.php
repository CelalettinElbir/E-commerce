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

{{$favoriteProducts}}

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container">
            <div class="cart__section--inner">
                <form action="#">
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
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="cart__product d-flex align-items-center">
                                            <button class="cart__remove--btn" aria-label="search button" type="button">
                                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" width="16px" height="16px">
                                                    <path
                                                        d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                </svg>
                                            </button>
                                            <div class="cart__thumbnail">
                                                <a href="product-details.html"><img class="border-radius-5"
                                                        src="assets/img/product/small-product/product9.webp"
                                                        alt="cart-product"></a>
                                            </div>
                                            <div class="cart__content">
                                                <h3 class="cart__content--title h4"><a href="product-details.html">Fluids &
                                                        Chemicals</a></h3>
                                                <span class="cart__content--variant">COLOR: Blue</span>
                                                <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">£65.00</span>
                                    </td>
                                    <td class="cart__table--body__list text-center">
                                        <span class="in__stock text__secondary">in stock</span>
                                    </td>
                                    <td class="cart__table--body__list text-right">
                                        <a class="wishlist__cart--btn primary__btn" href="cart.html">Add To Cart</a>
                                    </td>
                                </tr>
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="cart__product d-flex align-items-center">
                                            <button class="cart__remove--btn" aria-label="search button" type="button">
                                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" width="16px" height="16px">
                                                    <path
                                                        d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                </svg>
                                            </button>
                                            <div class="cart__thumbnail">
                                                <a href="product-details.html"><img class="border-radius-5"
                                                        src="assets/img/product/small-product/product8.webp"
                                                        alt="cart-product"></a>
                                            </div>
                                            <div class="cart__content">
                                                <h3 class="cart__content--title h4"><a href="product-details.html">Cargo
                                                        Accessories</a></h3>
                                                <span class="cart__content--variant">COLOR: Blue</span>
                                                <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">£65.00</span>
                                    </td>
                                    <td class="cart__table--body__list text-center">
                                        <span class="in__stock text__secondary">in stock</span>
                                    </td>
                                    <td class="cart__table--body__list text-right">
                                        <a class="wishlist__cart--btn primary__btn" href="cart.html">Add To Cart</a>
                                    </td>
                                </tr>
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="cart__product d-flex align-items-center">
                                            <button class="cart__remove--btn" aria-label="search button" type="button">
                                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" width="16px" height="16px">
                                                    <path
                                                        d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                </svg>
                                            </button>
                                            <div class="cart__thumbnail">
                                                <a href="product-details.html"><img class="border-radius-5"
                                                        src="assets/img/product/small-product/product7.webp"
                                                        alt="cart-product"></a>
                                            </div>
                                            <div class="cart__content">
                                                <h3 class="cart__content--title h4"><a href="product-details.html">Engine &
                                                        Drivetrain</a></h3>
                                                <span class="cart__content--variant">COLOR: Blue</span>
                                                <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">£65.00</span>
                                    </td>
                                    <td class="cart__table--body__list text-center">
                                        <span class="in__stock text__secondary">in stock</span>
                                    </td>
                                    <td class="cart__table--body__list text-right">
                                        <a class="wishlist__cart--btn primary__btn" href="cart.html">Add To Cart</a>
                                    </td>
                                </tr>
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="cart__product d-flex align-items-center">
                                            <button class="cart__remove--btn" aria-label="search button" type="button">
                                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" width="16px" height="16px">
                                                    <path
                                                        d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                </svg>
                                            </button>
                                            <div class="cart__thumbnail">
                                                <a href="product-details.html"><img class="border-radius-5"
                                                        src="assets/img/product/small-product/product6.webp"
                                                        alt="cart-product"></a>
                                            </div>
                                            <div class="cart__content">
                                                <h3 class="cart__content--title h4"><a
                                                        href="product-details.html">Motorbike Care</a></h3>
                                                <span class="cart__content--variant">COLOR: Blue</span>
                                                <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">£65.00</span>
                                    </td>
                                    <td class="cart__table--body__list text-center">
                                        <span class="in__stock text__secondary">in stock</span>
                                    </td>
                                    <td class="cart__table--body__list text-right">
                                        <a class="wishlist__cart--btn primary__btn" href="cart.html">Add To Cart</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="continue__shopping d-flex justify-content-between">
                            <a class="continue__shopping--link" href="index.html">Continue shopping</a>
                            <a class="continue__shopping--clear" href="shop.html">View All Products</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- cart section end -->
@endsection
