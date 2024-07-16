<!DOCTYPE html>
<html>

<head>
    <title>Sipariş Onayı</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        .logo {
            display: block;
            margin: 0 auto;
            text-align: center;
        }

        .product-list {
            list-style-type: none;
            padding: 0;
        }

        .product-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .product-image {
            max-width: 100px;
            margin-right: 10px;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="logo" src="{{ asset('upload/logo.jpg') }}" alt="Logo" style="max-width: 200px;">
        <h3 style="text-align: center;">Sipariş Onayı</h3>
        <p>{{ $order->user->name }}, siparişiniz için teşekkür ederiz!</p>
        <p>Sipariş ID: {{ $order->id }}</p>
        <p>Toplam: {{ $order->order_total }}</p>
        <p>Durum: {{ $order->status }}</p>

        <h3 style="text-align: center;">Sipariş Öğeleri</h3>
        <ul class="product-list">
            @foreach ($orderItems as $item)
            <li class="product-item">
                <img class="product-image" src="{{ asset('upload/products/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                <span>{{ $item->product->name }} - Miktar: {{ $item->quantity }} - Fiyat: {{ $item->price }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>