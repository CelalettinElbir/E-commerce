<div>
    @if (Cart::count() > 0)
        <div class="cart__table">
            <table class="cart__table--inner">
                <thead class="cart__table--header">
                    <tr class="cart__table--header__items">
                        <th class="cart__table--header__list">Ürün</th>
                        <th class="cart__table--header__list">Fiyat</th>
                        <th class="cart__table--header__list">Miktar</th>
                        <th class="cart__table--header__list">Toplam</th>
                    </tr>
                </thead>
                <tbody class="cart__table--body">

                    @foreach (Cart::content() as $item)
                        <tr class="cart__table--body__items">

                            <td class="cart__table--body__list">
                                <div class="cart__product d-flex align-items-center">
                                    <button class="cart__remove--btn" aria-label="search button"
                                        wire:click.prevent = "deleteItem('{{ $item->rowId }}')" type="button">
                                        X
                                    </button>
                                    <div class="cart__thumbnail">
                                        <a href="product-details.html"><img class="border-radius-5"
                                                src=" {{ asset('upload/products') . '/' . $item->options['image'] }}"
                                                alt="cart-product"></a>

                                    </div>
                                    <div class="cart__content">
                                        <h3 class="cart__content--title h4"><a
                                                href="product-details.html">{{ $item->name }}</a>
                                        </h3>
                                        <span class="cart__content--variant">{{ $item->options['brand'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cart__table--body__list">
                                <span class="cart__price">{{ $item->price }}</span>
                            </td>
                            <td class="cart__table--body__list">
                                <div class="quantity__box">
                                    <button type="button" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"
                                        class="quantity__value quickview__value--quantity decrease"
                                        aria-label="quantity value" value="Decrease Value">-</button>
                                    <label>
                                        <input type="number" class="quantity__number quickview__value--number"
                                            value="{{ $item->qty }}" data-counter />
                                    </label>
                                    <button type="button" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"
                                        class="quantity__value quickview__value--quantity increase"
                                        aria-label="quantity value" value="Increase Value">+</button>
                                </div>
                            </td>
                            <td class="cart__table--body__list">
                                <span class="cart__price end">{{ $item->subtotal }}</span>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        @else
            <h2>Sepette Ürün Bulunmamaktadır</h2>
    @endif






</div>
