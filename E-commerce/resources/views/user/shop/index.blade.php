@extends('layouts.user')


@section('content')
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">Ürünler</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="shop__section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4  col-md-4 shop-col-width-lg-4">
                    <div class="shop__sidebar--widget widget__area d-none d-lg-block">

                        <form action="" method="GET">

                            <div class="single__widget price__filter widget__bg">
                                <h2 class="widget__title h3">Fiyat Aralığı</h2>
                                <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                    <div class="price__filter--group">
                                        <label class="price__filter--label" for="Filter-Price-GTE2">En Az </label>
                                        <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                            <input class="price__filter--input__field border-0" name="min_price"
                                                id="Filter-Price-GTE2" type="number" placeholder="0" min="0">
                                        </div>
                                    </div>
                                    <div class="price__divider">
                                        <span>-</span>
                                    </div>
                                    <div class="price__filter--group">
                                        <label class="price__filter--label" for="Filter-Price-LTE2">En Çok</label>
                                        <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                            <input class="price__filter--input__field border-0" name="max_price"
                                                id="Filter-Price-LTE2" type="number" min="0" placeholder="250.00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Kategoriler</h2>
                                <ul class="widget__tagcloud d-flex flex-column">
                                    @foreach ($categories as $category)
                                        <li class="widget__tagcloud--item d-flex gap-2">
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                                            <label for="{{ $category->id }}">{{ $category->name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Brands -->
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Markalar</h2>
                                <ul class="widget__tagcloud d-flex flex-column">
                                    @foreach ($brands as $brand)
                                        <li class="widget__tagcloud--item d-flex gap-2">
                                            <input type="checkbox" name="brands[]" value="{{ $brand->id }}">
                                            <label for="{{ $brand->id }}">{{ $brand->name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="d-grid">
                                <button class="primary__btn price__filter--btn " type="submit">Filtrele</button>
                            </div>

                        </form>


                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 shop-col-width-lg-8">
                    <div class="shop__right--sidebar">

                        <div class="shop__product--wrapper">
                            <div class="shop__header d-flex align-items-center justify-content-between mb-30">
                                <div class="product__view--mode d-flex align-items-center">
                                    <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas>
                                        <svg class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="28"
                                                d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80" />
                                            <circle cx="336" cy="128" r="28" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="28" />
                                            <circle cx="176" cy="256" r="28" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="28" />
                                            <circle cx="336" cy="384" r="28" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="28" />
                                        </svg>
                                        <span class="widget__filter--btn__text">Filter</span>
                                    </button>
                                    <div class="product__view--mode__list product__short--by align-items-center d-flex ">
                                        <label class="product__view--label">Prev Page :</label>
                                        <div class="select shop__header--select">
                                            <select class="product__view--select">
                                                <option selected value="1">65</option>
                                                <option value="2">40</option>
                                                <option value="3">42</option>
                                                <option value="4">57 </option>
                                                <option value="5">60 </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="product__view--mode__list product__short--by align-items-center d-flex">
                                        <label class="product__view--label">Sort By :</label>
                                        <div class="select shop__header--select">
                                            <select class="product__view--select">
                                                <option selected value="1">Sort by latest</option>
                                                <option value="2">Sort by popularity</option>
                                                <option value="3">Sort by newness</option>
                                                <option value="4">Sort by rating </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="product__view--mode__list">
                                        <div
                                            class="product__tab--one product__grid--column__buttons d-flex justify-content-center">
                                            <button class="product__grid--column__buttons--icons active"
                                                aria-label="grid btn" data-toggle="tab" data-target="#product_grid">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                                    viewBox="0 0 9 9">
                                                    <g transform="translate(-1360 -479)">
                                                        <rect id="Rectangle_5725" data-name="Rectangle 5725"
                                                            width="4" height="4" transform="translate(1360 479)"
                                                            fill="currentColor" />
                                                        <rect id="Rectangle_5727" data-name="Rectangle 5727"
                                                            width="4" height="4" transform="translate(1360 484)"
                                                            fill="currentColor" />
                                                        <rect id="Rectangle_5726" data-name="Rectangle 5726"
                                                            width="4" height="4" transform="translate(1365 479)"
                                                            fill="currentColor" />
                                                        <rect id="Rectangle_5728" data-name="Rectangle 5728"
                                                            width="4" height="4" transform="translate(1365 484)"
                                                            fill="currentColor" />
                                                    </g>
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <p class="product__showing--count">Toplam Ürün sayısı {{ count($products) }}</p>
                            </div>
                            <div class="tab_content">
                                <div id="product_grid" class="tab_pane active show">
                                    <div class="product__section--inner">
                                        <div class="row mb--n30">
                                            @foreach ($products as $product)
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                                    <article class="product__card">
                                                        <div class="product__card--thumbnail">
                                                            <a class="product__card--thumbnail__link display-block"
                                                                href="{{ route('shop.show', $product->slug) }}">
                                                                <img class="product__card--thumbnail__img product__primary--img"
                                                                    src=" {{ asset('upload/products') . '/' . $product->image }}"
                                                                    alt="product-img">
                                                                <img class="product__card--thumbnail__img product__secondary--img"
                                                                    src=" {{ asset('upload/products') . '/' . $product->image }}"
                                                                    alt="product-img">
                                                            </a>
                                                            {{-- indirim olduğunda F --}}
                                                            {{-- <span class="product__badge">-11%</span> --}}
                                                            <ul
                                                                class="product__card--action d-flex align-items-center justify-content-center">
                                                                {{-- <li class="product__card--action__list">
                                                                    <a class="product__card--action__btn"
                                                                        title="Quick View" data-bs-toggle="modal"
                                                                        data-bs-target="#examplemodal"
                                                                        href="javascript:void(0)">
                                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                                        <span class="visually-hidden">Quick View</span>
                                                                    </a>
                                                                </li> --}}

                                                                <li class="product__card--action__list">
                                                                    <form id="favorite-form"
                                                                        action="{{ route('user.favorite.store', $product) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="product__card--action__btn">
                                                                            <i class="far fa-heart"></i>
                                                                            <span class="visually-hidden">Favorilere
                                                                                ekle</span>
                                                                        </button>
                                                                    </form>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product__card--content">

                                                            <h3 class="product__card--title"><a
                                                                    href="product-details.html">{{ $product->name }}
                                                                </a>
                                                            </h3>
                                                            <div class="product__card--price">


                                                                <span class="current__price">{{ $product->price }}
                                                                    TL</span>
                                                                {{-- <span class="old__price"> $315.00</span> --}}
                                                            </div>
                                                            <div class="product__card--footer">


                                                                @livewire('cart.cart-add', ['product' => $product])

                                                            </div>





                                                        </div>
                                                    </article>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="pagination__area">
                                <nav class="pagination justify-content-center">
                                    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">


                                        {{ $products->links('vendor.pagination.custom') }}

                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#favorite-form').on('submit', function(e) {
                e.preventDefault(); // Formun normal submit işlemini engelle

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'), // Formun action attribute'undan URL'yi al
                    data: $(this).serialize(), // Form verilerini al
                    success: function(response) {
                        // Favorilere ekleme başarılı olduğunda yapılacak işlemler
                        console.log('Ürün favorilere eklendi');
                        // Burada başka işlemler de yapılabilir, örneğin bir mesaj gösterme
                    },
                    error: function(xhr, status, error) {
                        // Favorilere ekleme sırasında bir hata oluştuğunda yapılacak işlemler
                        console.error(error);
                        // Hata durumunda kullanıcıya bir mesaj gösterilebilir
                    }
                });
            });
        });
    </script>
@endsection
