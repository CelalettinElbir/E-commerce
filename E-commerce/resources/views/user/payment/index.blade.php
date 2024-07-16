@extends('layouts.user')

@section('content')
<div class="checkout__page--area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="main checkout__main">
                    <form id="checkoutForm" action="{{ route('user.checkout.store') }}" method="post">
                        @csrf

                        <!-- Step 1: Billing and Address Information -->
                        <div id="step1" class="checkout__content--step section__billing--address">
                            <div class="section__header mb-15">
                                <h2 class="section__header--title h3">Fatura ve Adres Bilgileri</h2>
                            </div>
                            <div class="section__billing--address__content">
                                @if($addresses->isNotEmpty())
                                <div class="mb-20">
                                    <p>Kaydedilen Adresler</p>
                                    <div class="card-group">
                                        @foreach($addresses as $address)
                                        <div class="card m-2" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $address->address_name }}</h5>
                                                <p class="card-text">{{ $address->city }} / {{ $address->state }}</p>
                                                <label class="list-group-item">
                                                    <input type="radio" name="address_id" value="{{ $address->id }}">
                                                    Bu adresi seç
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-20">
                                    <label class="list-group-item">
                                        <input type="radio" name="address_id" value="new" checked>
                                        Yeni Adres
                                    </label>
                                </div>


                                @else
                                <div class="mb-20">
                                    <label class="list-group-item">
                                        <input type="radio" name="address_id" value="new" checked>
                                        Yeni Adres
                                    </label>
                                </div>




                                @endif
                                <div id="newAddressForm">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="address_name">Adres Adı <span class="checkout__input--label__star">*</span></label>
                                                <input id="address_name" class="checkout__input--field border-radius-5 form-control" placeholder="Adres Adı" type="text" name="address_name" required>


                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="tel_no">Telefon Numarası <span class="checkout__input--label__star">*</span></label>
                                                <input id="tel_no" class="checkout__input--field border-radius-5 form-control" placeholder="Telefon Numarası" type="text" name="tel_no" required>


                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="first_name">Ad <span class="checkout__input--label__star">*</span></label>
                                                <input id="first_name" class="checkout__input--field border-radius-5 form-control" placeholder="Ad" type="text" name="first_name" required>


                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="last_name">Soyad <span class="checkout__input--label__star">*</span></label>
                                                <input id="last_name" class="checkout__input--field border-radius-5 form-control" placeholder="Soyad" type="text" name="last_name" required>


                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="city">Şehir <span class="checkout__input--label__star">*</span></label>
                                                <input id="city" class="checkout__input--field border-radius-5 form-control" placeholder="Şehir" type="text" name="city" required>


                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="state">İlçe</label>
                                                <input id="state" class="checkout__input--field border-radius-5 form-control" placeholder="İlçe" type="text" name="state">

                                                @error('state')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="address">Adres <span class="checkout__input--label__star">*</span></label>
                                                <input id="address" class="checkout__input--field border-radius-5 form-control" placeholder="Adres" type="text" name="address" required>

                                                @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <input id="address2" class="checkout__input--field border-radius-5 form-control" placeholder="Apartman, daire, vs. (isteğe bağlı)" type="text" name="address2">

                                                @error('address2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="postal_code">Posta Kodu <span class="checkout__input--label__star">*</span></label>
                                                <input id="postal_code" class="checkout__input--field border-radius-5 form-control" placeholder="Posta Kodu" type="text" name="postal_code" required>

                                                @error('postal_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-2" for="tc">TC Kimlik Numarası</label>
                                                <input id="tc" class="checkout__input--field border-radius-5 form-control" placeholder="TC Kimlik Numarası" type="text" name="tc">

                                                @error('tc')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger mt-3">Ödeme Yap</butto>


                    </form>
                </div>

            </div>
            <div class="col-lg-5 col-md-6">
                <aside class="checkout__sidebar sidebar border-radius-10">
                    <h2 class="checkout__order--summary__title text-center mb-15">Sipariş Özetiniz</h2>
                    <div class="cart__table checkout__product--table">
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">

                                @if (Cart::count() > 0 )


                                @foreach (Cart::content() as $item)
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a class="display-block" href="urun-detay.html">
                                                    <img class="display-block border-radius-5" src="{{ asset("upload/products/{$item->options->image}") }}" alt="sepet-ürün">
                                                </a>
                                                <span class="product__thumbnail--quantity">{{ $item->qty }}</span>
                                            </div>
                                            <div class="product__description">
                                                <h4 class="product__description--name">
                                                    <a href="urun-detay.html">{{ $item->name }}</a>
                                                </h4>
                                                <span class="product__description--variant">{{ $item->options->brand }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">{{ $item->price }}</span>
                                    </td>
                                </tr>
                                @endforeach

                                @else

                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <p>Herhangi Bir Ürün Bulunmamaktadır!</p>
                                    <a href="{{ route('shop.index') }}" class="btn btn-primary mt-3">Alışverişe Devam et</a>
                                </div>

                                @endif



                            </tbody>
                        </table>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addressRadios = document.querySelectorAll('input[name="address_id"]');
        const newAddressForm = document.getElementById('newAddressForm');

        // Function to show or hide new address form based on selected address
        function toggleNewAddressForm() {
            const selectedAddress = document.querySelector('input[name="address_id"]:checked').value;
            if (selectedAddress === 'new') {
                newAddressForm.style.display = 'block';
                // Enable required attribute for new address fields
                document.getElementById('first_name').setAttribute('required', 'required');
                document.getElementById('last_name').setAttribute('required', 'required');
                document.getElementById('tel_no').setAttribute('required', 'required');
                document.getElementById('address_name').setAttribute('required', 'required');
                document.getElementById('city').setAttribute('required', 'required');
                document.getElementById('state').setAttribute('required', 'required');
                document.getElementById('address').setAttribute('required', 'required');
                document.getElementById('postal_code').setAttribute('required', 'required');
                document.getElementById('tc').setAttribute('required', 'required');
            } else {
                newAddressForm.style.display = 'none';
                // Disable required attribute for new address fields
                document.getElementById('first_name').removeAttribute('required');
                document.getElementById('last_name').removeAttribute('required');
                document.getElementById('tel_no').removeAttribute('required');
                document.getElementById('address_name').removeAttribute('required');
                document.getElementById('city').removeAttribute('required');
                document.getElementById('state').removeAttribute('required');
                document.getElementById('address').removeAttribute('required');
                document.getElementById('postal_code').removeAttribute('required');
                document.getElementById('tc').removeAttribute('required');
            }
        }

        // Initialize form state based on selected address
        toggleNewAddressForm();

        // Add event listener to address radios
        addressRadios.forEach(radio => {
            radio.addEventListener('change', toggleNewAddressForm);
        });

        // Submit form function
        function submitForm() {
            document.getElementById('checkoutForm').submit();
        }

        // Event listener for Ödeme Yap button
        const submitButton = document.querySelector('button[type="submit"]');
        submitButton.addEventListener('click', submitForm);
    });
</script>



@endsection