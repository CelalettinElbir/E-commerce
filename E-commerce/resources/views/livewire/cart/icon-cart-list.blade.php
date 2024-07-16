<div>

    @foreach ($cartItems as $item)
    <div class="minicart__product">
        <div class="minicart__product--items d-flex">
            <div class="minicart__thumb">
                @if ($item->options->has("image"))
                <a href="product-details.html"><img src=" {{ asset('upload/products') . '/' . $item->options['image'] }}" alt="prduct-img"></a>
                @endif

            </div>
            <div class="minicart__text">
                <h4 class="minicart__subtitle"><a href="product-details.html">{{ $item->name }}</a></h4>
                <span class="color__variant"><b>Marka:</b> {{ $item->options['brand'] }}</span>
                <div class="minicart__price">
                    <span class="minicart__current--price">{{ $item->price }}</span>
                    {{-- <span class="minicart__old--price">$140.00</span> --}}
                </div>
                <div class="minicart__text--footer d-flex align-items-center">



                    <div class="quantity__box minicart__quantity">
                        <button type="button" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                        <label>
                            <input type="number" class="quantity__number quickview__value--number" value="{{ $item->qty }}" data-counter />
                        </label>
                        <button type="button" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                    </div>


                    <button wire:click.prevent="deleteItem('{{ $item->rowId }}')" class="minicart__product--remove" type="button">Sil</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach



    <div class="minicart__amount mb-4">
        <div class="minicart__amount_list d-flex justify-content-between">
            <span>Ara Toplam</span>
            <span><b>{{ $cartSubTotal }}</b></span>
        </div>
        <div class="minicart__amount_list d-flex justify-content-between">
            <span>Toplam:</span>
            <span><b>{{ $cartTotal }}</b></span>
        </div>
    </div>


</div>