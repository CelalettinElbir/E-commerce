@extends('layouts.user')


@section('content')
<!-- Start product details section -->
<section class="product__details--section section--padding">
    <div class="container">
        <div class="row row-cols-lg-2 row-cols-md-2">
            <div class="col">
                <div class="product__details--media">
                    <div class="single__product--preview  swiper mb-25">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product__media--preview__items">
                                    <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ asset('upload/products') . '/' . $product->image }}"><img class="product__media--preview__items--img" src=" {{ asset('upload/products') . '/' . $product->image }}" alt="product-media-img"></a>
                                    <div class="product__media--view__icon">
                                        <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product2.webp" data-gallery="product-media-preview">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448">
                                                </path>
                                            </svg>
                                            <span class="visually-hidden">product view</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="single__product--nav swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product__media--nav__items">
                                    <img class="product__media--nav__items--img" src=" {{ asset('upload/products') . '/' . $product->image }}" alt="product-nav-img">
                                </div>
                            </div>


                        </div>
                        <div class="swiper__nav--btn swiper-button-next">

                            <i class="fa-solid fa-arrow-right"></i>

                        </div>
                        <div class="swiper__nav--btn swiper-button-prev">
                            <i class="fa-solid fa-arrow-left"></i>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product__details--info">
                    {{-- <form action="#"> --}}
                    <h2 class="product__details--info__title mb-15">{{ $product->name }}
                    </h2>
                    <div class="product__details--info__price mb-12">
                        <span class="current__price">{{ $product->price }} TL</span>
                        {{-- <span class="old__price">$68.00</span> --}}
                    </div>
                    {{-- <ul class="rating product__card--rating mb-15 d-flex">
                                <li class="rating__list">
                                    <span class="rating__icon">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__icon">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__icon">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__icon">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__icon">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </li>
                                <li>
                                    <span class="rating__review--text">(126) Review</span>
                                </li>
                            </ul> --}}
                    <p class="product__details--info__desc mb-15">{{ $product->short_description }}</p>
                    <div class="product__variant">
                        {{-- <div class="product__variant--list mb-10">
                                    <fieldset class="variant__input--fieldset">
                                        <legend class="product__variant--title mb-8">Color :</legend>
                                        <div class="variant__color d-flex">
                                            <div class="variant__color--list">
                                                <input id="color-red5" name="color" type="radio" checked>
                                                <label class="variant__color--value red" for="color-red5"
                                                    title="Red"><img class="variant__color--value__img"
                                                        src="assets/img/product/small-product/product1.webp"
                                                        alt="variant-color-img"></label>
                                            </div>
                                            <div class="variant__color--list">
                                                <input id="color-red6" name="color" type="radio">
                                                <label class="variant__color--value red" for="color-red6"
                                                    title="Black"><img class="variant__color--value__img"
                                                        src="assets/img/product/small-product/product2.webp"
                                                        alt="variant-color-img"></label>
                                            </div>
                                            <div class="variant__color--list">
                                                <input id="color-red7" name="color" type="radio">
                                                <label class="variant__color--value red" for="color-red7"
                                                    title="Pink"><img class="variant__color--value__img"
                                                        src="assets/img/product/small-product/product3.webp"
                                                        alt="variant-color-img"></label>
                                            </div>
                                            <div class="variant__color--list">
                                                <input id="color-red8" name="color" type="radio">
                                                <label class="variant__color--value red" for="color-red8"
                                                    title="Orange"><img class="variant__color--value__img"
                                                        src="assets/img/product/small-product/product4.webp"
                                                        alt="variant-color-img"></label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div> --}}
                        {{-- <div class="product__variant--list mb-20">
                                    <fieldset class="variant__input--fieldset">
                                        <legend class="product__variant--title mb-8">Weight :</legend>
                                        <ul class="variant__size d-flex">
                                            <li class="variant__size--list">
                                                <input id="weight4" name="weight" type="radio" checked>
                                                <label class="variant__size--value red" for="weight4">5 kg</label>
                                            </li>
                                            <li class="variant__size--list">
                                                <input id="weight5" name="weight" type="radio">
                                                <label class="variant__size--value red" for="weight5">3 kg</label>
                                            </li>
                                            <li class="variant__size--list">
                                                <input id="weight6" name="weight" type="radio">
                                                <label class="variant__size--value red" for="weight6">2 kg</label>
                                            </li>
                                        </ul>
                                    </fieldset>
                                </div> --}}
                        <div class="product__variant--list quantity d-flex align-items-center mb-20">
                            <div class="quantity__box">
                                <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                <label>
                                    <input type="number" class="quantity__number quickview__value--number" value="1" data-counter />
                                </label>
                                <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                            </div>
                            <button class="primary__btn quickview__cart--btn" type="submit">Sepete Ekle</button>
                        </div>


                        <div class="product__variant--list mb-15">

                            @auth



                            @if (auth()->user()->isFavorited($product->id))
                            <form action=" {{ route('user.favorite.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="variant__wishlist--icon mb-15 btn btn-lg" style="font-size: 1 rem;" type="submit"> <i class="fa-solid fa-heart fa-2x m-2"></i> Favorilerden sil
                                </button>
                            </form>
                            @else
                            <form action=" {{ route('user.favorite.store', $product) }}" method="POST">
                                @csrf

                                <button class="variant__wishlist--icon mb-15 btn btn-lg" style="font-size: 1 rem;" type="submit"> <i class="fa-solid fa-heart fa-2x m-2"></i> Favorilere Ekle
                                </button>
                            </form>
                            @endif
                            @endauth

                            <button class="variant__buy--now__btn primary__btn" type="submit">Şimdi Satın Al</button>
                        </div>
                        <div class="product__variant--list mb-15">
                            <div class="product__details--info__meta">
                                <p class="product__details--info__meta--list"><strong>Kategori:</strong> <span>
                                        {{ $product->category->name }}</span> </p>
                                <p class="product__details--info__meta--list">
                                    <strong>Lastik Ebatları:</strong>
                                    <span>{{ $product->width }}-{{ $product->aspect_ratio }}-{{ $product->rim_diameter }}</span>
                                </p>
                                <p class="product__details--info__meta--list"><strong>Marka:</strong>
                                    <span>{{ $product->brand->name }}</span>
                                </p>

                            </div>
                        </div>
                    </div>

                    {{-- <div class="guarantee__safe--checkout">
                            <h5 class="guarantee__safe--checkout__title">Guaranteed Safe Checkout</h5>
                            <img class="guarantee__safe--checkout__img" src="assets/img/other/safe-checkout.webp"
                                alt="Payment Image">
                        </div> --}}


                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End product details section -->


<!-- Start product details tab section -->
<section class="product__details--tab__section section--padding">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <ul class="product__tab--one product__details--tab d-flex mb-30">
                    <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">
                        Detaylar</li>

                    <!-- <li class="product__details--tab__list" data-toggle="tab" data-target="#information">Ek Bilgiler</li> -->
                </ul>
                <div class="product__details--tab__inner border-radius-10">
                    <div class="tab_content">
                        <div id="description" class="tab_pane active show">
                            <div class="product__tab--content">
                                <div class="product__tab--content__step mb-30">
                                    {!! $product->description !!}
                                </div>
                              
                                <div class="product__tab--content__step">
                                    <p class="product__tab--content__desc"> {!! $product->description !!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- <div id="information" class="tab_pane">
                            <div class="product__tab--conten">
                                <div class="product__tab--content__step">
                                    <ul class="additional__info_list">
                                        <li class="additional__info_list--item">
                                            <span class="info__list--item-head"><strong>Color</strong></span>
                                            <span class="info__list--item-content">Black, white, blue, red, gray</span>
                                        </li>
                                        <li class="additional__info_list--item">
                                            <span class="info__list--item-head"><strong>Weight</strong></span>
                                            <span class="info__list--item-content">2kg</span>
                                        </li>
                                        <li class="additional__info_list--item">
                                            <span class="info__list--item-head"><strong>Brand</strong></span>
                                            <span class="info__list--item-content">Gadget</span>
                                        </li>
                                        <li class="additional__info_list--item">
                                            <span class="info__list--item-head"><strong>Guarantee</strong></span>
                                            <span class="info__list--item-content">5 years</span>
                                        </li>
                                        <li class="additional__info_list--item">
                                            <span class="info__list--item-head"><strong>Battery</strong></span>
                                            <span class="info__list--item-content">10000 mA</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection