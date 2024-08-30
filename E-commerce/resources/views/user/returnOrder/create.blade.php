@extends('layouts.user')

@section('content')
<section class="section--padding">
    <div class="container">
        <div class="my__account--section__inner border-radius-10 d-flex">
            <x-user-side-bar />

            <div class="account__wrapper">
                <div class="card">
                    <div class="card-header">
                        Geri İade Talebi Oluştur
                    </div>
                    <div class="card-body">
                        <form action="{{ route('returns.store',$shopOrder) }}" method="POST">
                            @csrf
                            <input type="hidden" name="shop_order_id" value="{{ $shopOrder->id }}">

                            <div class="form-group">
                                <x-input-label for="reason" :value="__('Nedeniniz:')" />
                                <textarea name="reason" id="reason" class="form-control mb-5" required>{{ old('reason') }}</textarea>
                                @if ($errors->has('reason'))
                                <span class="text-danger">{{ $errors->first('reason') }}</span>
                                @endif
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Geri İade Talebi Oluştur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection