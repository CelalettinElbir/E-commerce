@extends('layouts.user')


@section('content')
    <section class=" section--padding">
        <div class="container">
            <div class="my__account--section__inner border-radius-10 d-flex">
                <x-user-side-bar />

                <div class="account__wrapper">
                    @foreach ($orders as $order)
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-3 col">
                                        Sipariş Tarihi
                                        <p>{{ $status[$order->status] }}</p>
                                    </div>
                                    <div class="col-md-3 col">

                                        Alıcı
                                        <p>{{ $order->address->first_name }} {{ $order->address->last_name }}</p>

                                    </div>
                                    <div class="col-md-3 col">
                                        Tutar
                                        <p>{{ $order->order_total }}</p>
                                    </div>
                                    <div class="col-md-3 col">
                                        <a href="{{ route('user.order.detail', $order) }}"
                                            class="btn primary__btn">Detay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="container row">

                                    <p class="col-md-6">{{ $status[$order->status] }}</p>
                                    <ul class=" col-md-6 d-flex">

                                        @foreach ($order->orderDetails as $orderItem)
                                            <li> <img
                                                    src="{{ asset('upload/products') . '/' . $orderItem->product->image }}"
                                                    style="height: auto;width:30%;">
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>

                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </section>
@endsection



{{-- TODO:Orders Yapılan Şiparişlerin hangi durumda olduğunu göstermem gerekiyor. --}}
