@extends('layouts.user')// Assuming you have a master layout file

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Failure</div>

                <div class="card-body">
                    <h1>Payment Failed</h1>
                    <p>Unfortunately, there was an issue processing your payment. Please try again or contact support.</p>
                    <p><a href="{{ route('checkout.payment') }}" class="btn btn-primary">Try Again</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection