@extends('layouts.user')


@section('content')
    <section class=" section--padding">
        <div class="container">
            <div class="my__account--section__inner border-radius-10 d-flex">
                <x-user-side-bar />

                <div class="account__wrapper">

                    <div class="card mb-5">

                        <div class="card-header">
                            @if ($shopOrder->status == 'Shipped')
                                <div class="d-flex justify-content-between">


                                    <span class="text-primary"><i class="fa-solid fa-truck"></i>
                                        {{ $status[$shopOrder->status] }} </span>


                                    {{ $shopOrder->tracking_number }}dasdas

                                </div>
                            @elseif($shopOrder->status == 'processing')
                                <span class="text-success"><i class="fas fa-check"></i>
                                    {{ $status[$shopOrder->status] }}</span>
                            @elseif($shopOrder->status == 'completed')
                                <span class="text-success"><i class="fas fa-check"></i>
                                    {{ $status[$shopOrder->status] }}</span>
                            @elseif($shopOrder->status == 'cancelled')
                                <span class="text-danger"><i class="fas fa-times"></i>
                                    {{ $status[$shopOrder->status] }}</span>
                            @elseif($shopOrder->status == 'delivered')
                                <span class="text-success"><i class="fas fa-check"></i>
                                    {{ $status[$shopOrder->status] }}</span>
                            @elseif($shopOrder->status == 'pending')
                                <span class="text-muted"><i class="fas fa-clock"></i>
                                    {{ $status[$shopOrder->status] }}</span>
                            @endif



                        </div>
                        <div class="card-body">

                            <div class="card-deck d-flex gap-2">
                                @foreach ($shopOrder->orderDetails as $item)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <img src="{{ asset('upload/products') . '/' . $item->product->image }}"
                                                        alt="{{ $item->product->name }}" height="max-content">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="/product/{{ $item->product->slug }}">
                                                        <p class="card-text"> {{ $item->product->name }}
                                                            <br>
                                                            <span class="text-danger"> {{ $shopOrder->order_total }}
                                                                TL</span>
                                                        </p>
                                                    </a>



                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                @endforeach


                            </div>




                        </div>



                    </div>




                    <div class="row">
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    Teslimat Bilgileri
                                </div>
                                <div class="card-body">
                                    <p>{{ $shopOrder->address->first_name }} {{ $shopOrder->address->last_name }} </p>

                                    <p>{{ $shopOrder->address->address_line_1 }}</p>
                                    <p>{{ $shopOrder->address->city }} / {{ $shopOrder->address->state }} </p>
                                    <p> <i class="fa fa-phone mr-5"
                                            aria-hidden="true"></i>{{ $shopOrder->address->tel_no }}
                                    </p>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Ödeme Bilgileri
                                </div>
                                <div class="card-body">
                                    <p>
                                        <span>
                                            {{ $shopOrder->order_total }} TL
                                        </span>
                                    </p>

                                </div>
                            </div>
                        </div>


                    </div>



                </div>
            </div>
        </div>
    </section>
@endsection
