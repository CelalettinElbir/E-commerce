@extends('layouts.user')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Information</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.payment.process') }}">
                        @csrf

                        {{-- Card Number --}}
                        <div class="form-group row">
                            <label for="card_number" class="col-md-4 col-form-label text-md-right">Card Number</label>

                            <div class="col-md-6">
                                <input id="card_number" type="text" class="form-control @error('card_number') is-invalid @enderror" name="card_number" required autocomplete="cc-number">

                                @error('card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Expiry Month and Year --}}
                        <div class="form-group row">
                            <label for="expiry_month" class="col-md-4 col-form-label text-md-right">Expiry Month</label>

                            <div class="col-md-3">
                                <input id="expiry_month" type="text" class="form-control @error('expiry_month') is-invalid @enderror" name="expiry_month" required autocomplete="cc-exp-month">

                                @error('expiry_month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="expiry_year" class="col-md-2 col-form-label text-md-right">Expiry Year</label>

                            <div class="col-md-3">
                                <input id="expiry_year" type="text" class="form-control @error('expiry_year') is-invalid @enderror" name="expiry_year" required autocomplete="cc-exp-year">

                                @error('expiry_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- CVV --}}
                        <div class="form-group row">
                            <label for="cvv" class="col-md-4 col-form-label text-md-right">CVV</label>

                            <div class="col-md-6">
                                <input id="cvv" type="text" class="form-control @error('cvv') is-invalid @enderror" name="cvv" required autocomplete="off">

                                @error('cvv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Pay Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection