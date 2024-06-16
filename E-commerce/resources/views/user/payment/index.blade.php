@extends('layouts.user')


@section('content')
    <div class="checkout__page--area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="main checkout__mian">
                        <form action="#">
                            <div class="checkout__content--step section__contact--information">
                                <div
                                    class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                    <h2 class="section__header--title h3">İletişim Bilgileri</h2>
                                    <p class="layout__flex--item">
                                        Zaten bir hesabınız var mı?
                                        <a class="layout__flex--item__link" href="giris.html">Giriş Yap</a>
                                    </p>
                                </div>
                                <div class="customer__information">
                                    <div class="checkout__email--phone mb-12">
                                        <label>
                                            <input class="checkout__input--field border-radius-5"
                                                placeholder="E-posta veya cep telefonu numarası" type="text">
                                        </label>
                                    </div>
                                    <div class="checkout__checkbox">
                                        <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label" for="check1">
                                            Haber ve teklifler için bana e-posta gönder</label>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h2 class="section__header--title h3">Fatura Detayları</h2>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                            <div class="checkout__input--list ">
                                                <label class="checkout__input--label mb-5" for="input1">Ad <span
                                                        class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5"
                                                    placeholder="Ad (isteğe bağlı)" id="input1" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input2">Soyad <span
                                                        class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Soyad"
                                                    id="input2" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input3">Şirket Adı <span
                                                        class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5"
                                                    placeholder="Şirket (isteğe bağlı)" id="input3" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input4">Adres <span
                                                        class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Adres1"
                                                    id="input4" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <input class="checkout__input--field border-radius-5"
                                                    placeholder="Apartman, daire, vs. (isteğe bağlı)" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input5">Şehir <span
                                                        class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Şehir"
                                                    id="input5" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="country">Ülke/Bölge <span
                                                        class="checkout__input--label__star">*</span></label>
                                                <div class="checkout__input--select select">
                                                    <select class="checkout__input--select__field border-radius-5"
                                                        id="country">
                                                        <option value="1">Türkiye</option>
                                                        <option value="2">Amerika Birleşik Devletleri</option>
                                                        <option value="3">Hollanda</option>
                                                        <option value="4">Afganistan</option>
                                                        <option value="5">Adalar</option>
                                                        <option value="6">Arnavutluk</option>
                                                        <option value="7">Antigua ve Barbuda</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input6">Posta Kodu <span
                                                        class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5"
                                                    placeholder="Posta kodu" id="input6" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <details>
                                    <summary class="checkout__checkbox mb-20">
                                        <input class="checkout__checkbox--input" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <span class="checkout__checkbox--label">Farklı bir adrese gönderilsin mi?</span>
                                    </summary>
                                    <div class="section__shipping--address__content">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-5" for="input7">Ad <span
                                                            class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Ad (isteğe bağlı)" id="input7" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input8">Soyad <span
                                                            class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Soyad" id="input8" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input9">Şirket Adı
                                                        <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Şirket (isteğe bağlı)" id="input9"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input10">Adres <span
                                                            class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Adres1" id="input10" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Apartman, daire, vs. (isteğe bağlı)" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input11">Şehir <span
                                                            class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Şehir" id="input11" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="country2">Ülke/Bölge
                                                        <span class="checkout__input--label__star">*</span></label>
                                                    <div class="checkout__input--select select">
                                                        <select class="checkout__input--select__field border-radius-5"
                                                            id="country2">
                                                            <option value="1">Türkiye</option>
                                                            <option value="2">Amerika Birleşik Devletleri</option>
                                                            <option value="3">Hollanda</option>
                                                            <option value="4">Afganistan</option>
                                                            <option value="5">Adalar</option>
                                                            <option value="6">Arnavutluk</option>
                                                            <option value="7">Antigua ve Barbuda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input12">Posta Kodu
                                                        <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Posta kodu" id="input12" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </details>
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox--input" id="checkbox2" type="checkbox">
                                    <span class="checkout__checkbox--checkmark"></span>
                                    <label class="checkout__checkbox--label" for="checkbox2">
                                        Bu bilgileri bir dahaki sefere kaydet</label>
                                </div>
                            </div>
                            <div class="order-notes mb-20">
                                <label class="checkout__input--label mb-5" for="order">Sipariş Notları <span
                                        class="checkout__input--label__star">*</span></label>
                                <textarea class="checkout__notes--textarea__field border-radius-5" id="order"
                                    placeholder="Siparişinizle ilgili notlar, örneğin teslimat için özel notlar." spellcheck="false"></textarea>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <a class="continue__shipping--btn primary__btn border-radius-5" href="index.html">Kargo
                                    İşlemine Devam</a>
                                <a class="previous__link--content" href="sepet.html">Sepete Dön</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <aside class="checkout__sidebar sidebar border-radius-10">
                        <h2 class="checkout__order--summary__title text-center mb-15">Sipariş Özetiniz</h2>
                        <div class="cart__table checkout__product--table">
                            <table class="cart__table--inner">





                                <tbody class="cart__table--body">
                                    @foreach (Cart::content() as $item)
                                    {{-- @dd($item->options->image) --}}
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a class="display-block" href="urun-detay.html"><img
                                                                class="display-block border-radius-5"
                                                                src="{{asset("upload/products/{$item->options->image} ")  }}"
                                                                alt="sepet-ürün"></a>
                                                        <span class="product__thumbnail--quantity">{{$item->qty}}</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h4 class="product__description--name"><a
                                                                href="urun-detay.html">{{$item->name}}</a></h4>
                                                        <span class="product__description--variant">{{$item->options->brand}}</span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cart__table--body__list">
                                                <span class="cart__price">{{$item->price}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout__discount--code">
                            <form class="d-flex" action="#">
                                <label>
                                    <input class="checkout__discount--code__input--field border-radius-5"
                                        placeholder="Hediye kartı veya indirim kodu" type="text">
                                </label>
                                <button class="checkout__discount--code__btn primary__btn border-radius-5"
                                    type="submit">Uygula</button>
                            </form>
                        </div>
                        <div class="checkout__total">
                            <table class="checkout__total--table">
                                <tbody class="checkout__total--body">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Ara Toplam </td>
                                        <td class="checkout__total--amount text-right">$860.00</td>
                                    </tr>
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Kargo</td>
                                        <td class="checkout__total--calculated__text text-right">Sonraki adımda
                                            hesaplanacak</td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Toplam</td>
                                        <td class="checkout__total--amount text-right">$860.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="checkout__payment--options text-center">
                            <p class="mb-15">Ödeme seçenekleriniz</p>
                            <ul class="payment__list d-flex justify-content-center">
                                <li class="payment__list--item">
                                    <img src="assets/img/payment-method/pay1.png" alt="Mastercard">
                                </li>
                                <li class="payment__list--item">
                                    <img src="assets/img/payment-method/pay2.png" alt="Visa">
                                </li>
                                <li class="payment__list--item">
                                    <img src="assets/img/payment-method/pay3.png" alt="Maestro">
                                </li>
                                <li class="payment__list--item">
                                    <img src="assets/img/payment-method/pay4.png" alt="PayPal">
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>











    {{-- <section class="shipping__section">
        <div class="container">
            <div class="shipping__inner style2 d-flex">
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping1.webp" alt="ikon-resmi">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Ücretsiz Kargo</h2>
                        <p class="shipping__content--desc">100 TL ve üzeri alışverişlerde ücretsiz kargo</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping2.webp" alt="ikon-resmi">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">24/7 Destek</h2>
                        <p class="shipping__content--desc">Günün her saati bizimle iletişime geçebilirsiniz</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping3.webp" alt="ikon-resmi">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">%100 Para İade Garantisi</h2>
                        <p class="shipping__content--desc">Ürünü 30 gün içinde iade edebilirsiniz</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping4.webp" alt="ikon-resmi">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Güvenli Ödeme</h2>
                        <p class="shipping__content--desc">Güvenli ödeme sağlıyoruz</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
