@extends('layouts.user')

@section('content')
<div class="checkout__page--area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main checkout__main">
                    <div class="section__header mb-15">
                        <h2 class="section__header--title h3">Siparişiniz başarıyla tamamlandı!</h2>
                    </div>
                    <p>Teşekkür ederiz! Siparişiniz başarıyla tamamlandı ve işleme alındı.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary">Ana Sayfaya Dön</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection