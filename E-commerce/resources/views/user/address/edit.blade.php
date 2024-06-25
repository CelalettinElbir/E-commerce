@extends('layouts.user')





@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cities = {!! json_encode($cities) !!};

            var cityDropdown = document.getElementById('city');
            var districtDropdown = document.getElementById('state');

            cityDropdown.addEventListener('change', function() {
                var selectedCity = this.value;
                var districts = [];

                // Seçilen ilin ilçelerini al
                for (var i = 0; i < cities["data"].length; i++) {
                    if (cities["data"][i]["il_adi"] === selectedCity) {
                        districts = cities["data"][i]["ilceler"];
                        break;
                    }
                }

                // İlçe dropdown'ını temizle
                districtDropdown.innerHTML = '';

                // İlçe bilgilerini doldur
                for (var i = 0; i < districts.length; i++) {
                    var option = document.createElement('option');
                    option.value = districts[i]["ilce_adi"];
                    option.text = districts[i]["ilce_adi"];
                    districtDropdown.appendChild(option);
                }
            });
        });
    </script>


    <section class="my__account--section section--padding">
        <div class="container">
            <div class="my__account--section__inner border-radius-10 d-flex">


                <x-user-side-bar />

                <div class="account__wrapper">
                    <div class="account__content">

                        <div class="login__section section--padding">



                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title mb-10"></h2>
                                    <p class="account__login--header__desc">Adres Güncelle</p>
                                </div>
                                <div class="account__login--inner">


                                    <form action="{{ route('user.address.update', $address) }}" method="POST">
                                        @csrf
                                        @method('PUT') <div class="row">
                                            <div class="col-md-6">
                                                <label for="address_name">Adres</label>
                                                <input type="text" name="addres_name" class="account__login--input"
                                                    id="address_name" value="{{ $address->addres_name }}">
                                                @error('addres_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="postal_code">Posta Kodu</label>
                                                <input type="text" name="postal_code" class="account__login--input"
                                                    id="postal_code" value="{{ $address->postal_code }}">
                                                @error('postal_code')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="first_name">Ad</label>
                                                <input type="text" name="first_name" class="account__login--input"
                                                    id="first_name" value="{{ $address->first_name }}">
                                                @error('first_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="last_name">Soyad</label>
                                                <input type="text" name="last_name" class="account__login--input"
                                                    id="last_name" value="{{ $address->last_name }}">
                                                @error('last_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                Şehir
                                                <select name="city"  id = "city"
                                                    class="account__login--input">
                                                    <option>{{ $address->city }}</option>
                                                    @foreach ($cities['data'] as $city)
                                                        <option value="{{ $city['il_adi'] }}">{{ $city['il_adi'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('city')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                                </label>

                                            </div>
                                            <div class="col-md-6">
                                                İlçe
                                                <select name="state" value = "{{ $address->state }}" id="state"
                                                    class="account__login--input">
                                                    <option >{{ $address->state }}</option>
                                                    <!-- İlçeler buraya dinamik olarak gelecek -->
                                                </select>
                                                @error('state')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="tel_no">Telefon</label>
                                                <input type="tel" name="tel_no" class="account__login--input"
                                                    id="tel_no" maxlength="17" placeholder="(5XX) XXX XX XX"
                                                    value="{{ $address->tel_no }}" oninput="formatPhoneNumber(this)">
                                                @error('tel_no')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tc">Tc Kimlik No</label>
                                                <input type="text" name="tc" class="account__login--input"
                                                    id="tc" pattern="\d*" maxlength="11"
                                                    value="{{ $address->tc }}">
                                                @error('tc')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="address_line_1">Detaylı Adres</label>
                                                <textarea name="address_line_1" class="account__login--input" id="address_line_1" rows="5">{{ $address->address_line_1 }}</textarea>
                                                @error('address_line_1')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-grid ">
                                            <button class="btn  btn-success " type="submit">Güncelle</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>

                    </div>


                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
