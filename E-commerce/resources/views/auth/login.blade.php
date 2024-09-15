@extends('layouts.user')



@section('content')
    <!-- Session Status -->

    <section class="cart__section section--padding">






        <x-auth-session-status class="mb-4" :status="session('status')" />


        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-md-6 mx-auto">
                <div class="account__login">
                    <div class="account__login--header mb-25">
                        <h2 class="account__login--header__title mb-10">Giriş yap </h2>
                    </div>
                    <div class="account__login--inner">
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class=" account__login--input" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class=" account__login--input" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>



                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('beni hatırla') }}</span>
                            </label>
                        </div>





                        <x-primary-button class="account__login--btn primary__btn pb-4">
                            {{ __('Giriş Yap ') }}
                        </x-primary-button>




                    <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Hesabınız Yok mu?') }}
                    </a>
                </div>
                        <!-- <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Parolanızı mı unuttunuz ?') }}
                                </a>
                            @endif


                        </div> -->

                    </div>
                </div>

            </div>



        </form>

    </section>
@endsection
