@extends('layouts.user')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf


        <div class="col-md-6 mx-auto">


            <div class="account__login--header mb-25">
                <h2 class="account__login--header__title mb-10">Kayıt Ol</h2>
            </div>
            <!-- Name -->

            <div class="account__login register">


                <div class="account__login--inner">
                    <label>
                        <x-text-input id="name" class=" account__login--input" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" placeholder="İsim" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </label>
                    <label>
                        <x-text-input id="name" class=" account__login--input" type="text" name="email"
                            :value="old('name')" required autofocus autocomplete="username" placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </label>
                    <label>
                        <x-text-input id="password" class="account__login--input" type="password" name="password" required
                            autocomplete="new-password" placeholder="Şifre" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </label>
                    <label>
                        <x-text-input id="password_confirmation" class="account__login--input" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirm Password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </label>
                    <button class="account__login--btn primary__btn mb-10" type="submit">Submit & Register</button>
                    {{-- <div class="account__login--remember position__relative">
                        <input class="checkout__checkbox--input" id="check2" type="checkbox">
                        <span class="checkout__checkbox--checkmark"></span>
                        <label class="checkout__checkbox--label login__remember--label" for="check2">
                            </label>
                    </div> --}}
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Hesabınız Var mı?') }}
                    </a>


                </div>

            </div>



            {{-- 
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
@endsection

{{-- 

<div class="col">
    <div class="account__login register">
        <div class="account__login--header mb-25">
            <h2 class="account__login--header__title mb-10">Create an Account</h2>
            <p class="account__login--header__desc">Register here if you are a new customer</p>
        </div>
        <div class="account__login--inner">
            <label>
                <input class="account__login--input" placeholder="Username" type="text">
            </label>
            <label>
                <input class="account__login--input" placeholder="Email Addres" type="email">
            </label>
            <label>
                <input class="account__login--input" placeholder="Password" type="password">
            </label>
            <label>
                <input class="account__login--input" placeholder="Confirm Password" type="password">
            </label>
            <button class="account__login--btn primary__btn mb-10" type="submit">Submit & Register</button>
            <div class="account__login--remember position__relative">
                <input class="checkout__checkbox--input" id="check2" type="checkbox">
                <span class="checkout__checkbox--checkmark"></span>
                <label class="checkout__checkbox--label login__remember--label" for="check2">
                    I have read and agree to the terms & conditions</label>
            </div>
        </div>
    </div>
</div> --}}
