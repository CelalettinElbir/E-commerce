@extends('layouts.user')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="col-md-6 mx-auto">

            <div class="account__login--header mb-25">
                <h2 class="account__login--header__title mb-10">Kayıt Ol</h2>
            </div>
            <!-- İsim -->

            <div class="account__login register">

                <div class="account__login--inner">
                    <label>
                        <x-text-input id="name" class="account__login--input" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" placeholder="İsim" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </label>
                    
                    <!-- Email -->
                    <label>
                        <x-text-input id="email" class="account__login--input" type="text" name="email"
                            :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </label>
                    
                    <!-- Şifre -->
                    <label>
                        <x-text-input id="password" class="account__login--input" type="password" name="password" required
                            autocomplete="new-password" placeholder="Şifre" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </label>
                    
                    <!-- Şifre Doğrulama -->
                    <label>
                        <x-text-input id="password_confirmation" class="account__login--input" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Şifreyi Onayla" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </label>
                    
                    <button class="account__login--btn primary__btn mb-10" type="submit">Kayıt Ol</button>

                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Hesabınız Var mı?') }}
                    </a>
                </div>

            </div>

        </div>
    </form>
@endsection
