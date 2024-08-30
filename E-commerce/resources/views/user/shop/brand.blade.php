@extends('layouts.user')


@section('content')
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <h1 class="breadcrumb__content--title">{{$brand->name}}</h1>

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

                    <form action="{{route("shop.showBrand",$brand->slug)}}" method="GET" id="filterForm">
                        <!-- Existing filters -->

                        <!-- Hidden inputs for the selected filters -->
                        @if(request('min_price'))
                        <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                        @endif
                        @if(request('max_price'))
                        <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                        @endif
                        @if(request('categories'))
                        @foreach(request('categories') as $category)
                        <input type="hidden" name="categories[]" value="{{ $category }}">
                        @endforeach
                        @endif
                        @if(request('brands'))
                        @foreach(request('brands') as $brand)
                        <input type="hidden" name="brands[]" value="{{ $brand }}">
                        @endforeach
                        @endif
                        @if(request('width'))
                        <input type="hidden" name="width" value="{{ request('width') }}">
                        @endif
                        @if(request('aspect_ratio'))
                        <input type="hidden" name="aspect_ratio" value="{{ request('aspect_ratio') }}">
                        @endif
                        @if(request('rim_diameter'))
                        <input type="hidden" name="rim_diameter" value="{{ request('rim_diameter') }}">
                        @endif

                        <!-- Other filters -->
                        <div class="single__widget price__filter widget__bg">
                            <h2 class="widget__title h3">Fiyat Aralığı</h2>
                            <div class="price__filter--form__inner mb-15">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="min_price">En Az</label>
                                            <input type="number" class="form-control" id="min_price" name="min_price" placeholder="0" min="0" value="{{ request('min_price') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="max_price">En Çok</label>
                                            <input type="number" class="form-control" id="max_price" name="max_price" placeholder="250.00" min="0" value="{{ request('max_price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Brands -->
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Kategoriler</h2>
                            <ul class="widget__tagcloud d-flex flex-column">
                                @foreach ($categories as $category)
                                <li class="widget__tagcloud--item d-flex gap-2">
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" @if(in_array($category->id, request('categories', []))) checked @endif>
                                    <label for="{{ $category->id }}">{{ $category->name }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Width -->
                        <div class="single__widget widget__bg">
                            <a class="widget__title h3  d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#widthCollapse" aria-expanded="false" aria-controls="brandCollapse">
                                Genişliği
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="collapse" id="widthCollapse">
                                <div class="search__filter--radio">
                                    @foreach(range(145, 345, 10) as $width)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="width" id="width_{{ $width }}" value="{{ $width }}" @if(request('width')==$width) checked @endif>
                                        <label class="form-check-label" for="width_{{ $width }}">{{ $width }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Aspect Ratio -->
                        <div class="single__widget widget__bg">
                            <a class="widget__title h3  d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#aspectRatioCollapse" aria-expanded="false" aria-controls="brandCollapse">
                                Yanak Oranı
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="collapse show" id="aspectRatioCollapse">
                                @foreach([30, 35, 40] as $aspectRatio)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="aspect_ratio" id="aspect_ratio_{{ $aspectRatio }}" value="{{ $aspectRatio }}" @if(request('aspect_ratio')==$aspectRatio) checked @endif>
                                    <label class="form-check-label" for="aspect_ratio_{{ $aspectRatio }}">{{ $aspectRatio }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Rim Diameter -->
                        <div class="single__widget widget__bg">
                            <a class="widget__title h3  d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#rimDiameterCollapse" aria-expanded="false" aria-controls="brandCollapse">
                                Jant Çapı
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="collapse show" id="rimDiameterCollapse">
                                @foreach([13, 14, 15] as $rimDiameter)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rim_diameter" id="rim_diameter_{{ $rimDiameter }}" value="{{ $rimDiameter }}" @if(request('rim_diameter')==$rimDiameter) checked @endif>
                                    <label class="form-check-label" for="rim_diameter_{{ $rimDiameter }}">{{ $rimDiameter }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="shop__sidebar--footer d-flex justify-content-between align-items-center p-3 bg-light rounded">
                            <button class="btn primary__btn btn-lg">Ara</button>
                            <a href="{{route("shop.showBrand",$brand->slug)}}" class="btn btn-secondary btn-lg">Temizle</a>
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
                                    <svg class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80" />
                                        <circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                                        <circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                                        <circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                                    </svg>
                                    <span class="widget__filter--btn__text">Filtrele</span>
                                </button>
                                <!-- <div class="product__view--mode__list product__short--by align-items-center d-flex ">
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
                                </div> -->



                                <div class="product__view--mode__list product__short--by align-items-center d-flex">

                                    <div class="product__view--mode__list product__short--by align-items-center d-flex">
                                        <label class="product__view--label">Sırala:</label>
                                        <div class="select shop__header--select">
                                            <select class="product__view--select" name="sort" id="sort" form="filterForm">
                                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Son Eklenen Ürünler</option>
                                                <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Popülerlik</option>
                                                <option value="newness" {{ request('sort') == 'newness' ? 'selected' : '' }}>Yenilik</option>
                                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Oylama</option>
                                                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Ucuzdan Pahalıya</option>
                                                <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>Pahalıdan Ucuza</option>
                                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Ürün Adı (A - Z)</option>
                                                <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>Ürün Adı (Z - A)</option>

                                            </select>
                                        </div>
                                    </div>


                                </div>



                                <div class="product__view--mode__list">
                                    <div class="product__tab--one product__grid--column__buttons d-flex justify-content-center">
                                        <button class="product__grid--column__buttons--icons active" aria-label="grid btn" data-toggle="tab" data-target="#product_grid">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                                <g transform="translate(-1360 -479)">
                                                    <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor" />
                                                    <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor" />
                                                    <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor" />
                                                    <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor" />
                                                </g>
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <p class="product__showing--count">Toplam Ürün sayısı {{ $productCount}}</p>

                        </div>
                        <div class="tab_content">
                            <div id="product_grid" class="tab_pane active show">
                                <div class="product__section--inner">
                                    <div class="row mb--n30">
                                        @foreach ($products as $product)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                            <article class="product__card">
                                                <div class="product__card--thumbnail">

                                                    <a class="product__card--thumbnail__link display-block" href="{{ route('shop.show', $product->slug) }}">
                                                        <img class="product__card--thumbnail__img product__primary--img" src=" {{ asset('upload/products') . '/' . $product->image }}" alt="product-img">
                                                        <img class="product__card--thumbnail__img product__secondary--img" src=" {{ asset('upload/products') . '/' . $product->image }}" alt="product-img">
                                                    </a>
                                                    {{-- indirim olduğunda F --}}
                                                    {{-- <span class="product__badge">-11%</span> --}}
                                                    <ul class="product__card--action d-flex align-items-center justify-content-center">
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
                                                            <form class="favorite-form" action="{{ route('user.favorite.store', $product) }}" method="post">
                                                                @csrf
                                                                <button type="button" class="favorite-button product__card--action__btn">
                                                                    <i class="far fa-heart"></i>
                                                                    <span class="visually-hidden">Favorilere ekle</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__card--content">

                                                    <h3 class="product__card--title"><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}
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

<script type="text/javascript">
    $(document).ready(function() {
        // CSRF Token ayarları
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Tıklama olayını favori butonları için bağlama
        $(document).on('click', '.favorite-button', function() {
            var button = $(this);
            var form = button.closest('.favorite-form');
            var actionUrl = form.attr('action');
            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: form.serialize(),
                success: function(response) {
                    toastr.success('Başarıyla Favorilere eklendi ');
                    button.find('i').removeClass('far').addClass('fas');
                    button.prop('filterFormdisabled', true); // Disable the button after successful action


                    $('.favorite_count').each(function() {
                        console.log("deneme");
                        var currentCount = parseInt($(this).text());
                        $(this).text(currentCount + 1); // Increment the favorite count
                    });

                },
                error: function(xhr, status, error) {
                    // Handle error response
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Bir hata oluştu, lütfen tekrar deneyin.';

                    toastr.error('Bilinmeyen bir hata oluştu!');

                }
            });
        });








    });
</script>

<script>
    $(document).ready(function() {
        $('#filterForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Construct the URL based on current filters
            var baseUrl = "{{ route('shop.showBrand',$brand->slug) }}"; // Replace with your route URL
            var params = [];

            // Add min_price and max_price if available
            var minPrice = $('#min_price').val();
            var maxPrice = $('#max_price').val();
            if (minPrice) {
                params.push('min_price=' + encodeURIComponent(minPrice));
            }
            if (maxPrice) {
                params.push('max_price=' + encodeURIComponent(maxPrice));
            }

            // Add categories
            $('input[name="categories[]"]:checked').each(function() {
                params.push('categories[]=' + encodeURIComponent($(this).val()));
            });

            // Add brands
            $('input[name="brands[]"]:checked').each(function() {
                params.push('brands[]=' + encodeURIComponent($(this).val()));
            });

            // Add width, aspect_ratio, and rim_diameter
            var width = $('input[name="width"]:checked').val();
            if (width) {
                params.push('width=' + encodeURIComponent(width));
            }

            var aspectRatio = $('input[name="aspect_ratio"]:checked').val();
            if (aspectRatio) {
                params.push('aspect_ratio=' + encodeURIComponent(aspectRatio));
            }

            var rimDiameter = $('input[name="rim_diameter"]:checked').val();
            if (rimDiameter) {
                params.push('rim_diameter=' + encodeURIComponent(rimDiameter));
            }

            var sortOption = $('#sort').val();
            if (sortOption) {
                params.push('sort=' + encodeURIComponent(sortOption));
            }

            // Construct the final URL
            var url = baseUrl + '?' + params.join('&');

            // Redirect to the constructed URL
            window.location.href = url;
        });


        $('#sort').change(function() {
            $("#filterForm").submit(); // Submit form on change

            var selectedOption = $(this).find('option:selected').text();
        });




    });
</script>





@endsection