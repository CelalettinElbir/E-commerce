@extends('layouts.user')

<script>
    // public/js/custom.js (veya başka bir yerde)
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

    function formatPhoneNumber(input) {
        // Remove all characters that are not digits
        var phoneNumber = input.value.replace(/\D/g, '');

        // Check if the input value is not empty
        if (phoneNumber) {
            // Format the phone number as +90 XXX XXX XX XX if the length is 10
            if (phoneNumber.length === 10) {
                var formattedPhoneNumber = '+90 ' + phoneNumber.substring(0, 3) + ' ' + phoneNumber.substring(3, 6) +
                    ' ' + phoneNumber.substring(6, 8) + ' ' + phoneNumber.substring(8, 10);
                input.value = formattedPhoneNumber;
            }
        }
    }
</script>


@section('content')
    <section class="my__account--section section--padding">
        <div class="container">
            <div class="my__account--section__inner border-radius-10 d-flex">
                <x-user-side-bar />

                <div class="account__wrapper">
                    <div class="account__content">
                        <button type="button" class="btn btn-success btn-lg float-end" data-bs-toggle="modal"
                            data-bs-target="#createModal">
                            &plus;
                            Yeni Adress Ekle
                        </button>
                        <div class="login__section section--padding">




                            @livewire('address.ListAdresses')


                            @livewire('address.CreateAddress')



                        </div>

                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
