@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Mağaza Siparişleri Detayları</h3>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title box-title-bold">Kargo bilgileri</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tr>
                                <th>Adres</th>
                                <td>{{ $ShopOrder->address->address_line_1 }}</td>
                            </tr>
                            <tr>
                                <th>Adres devamı </th>
                                <td>{{ $ShopOrder->address->address_line_2 }}</td>
                            </tr>
                            <tr>
                                <th>Şehir</th>
                                <td>{{ $ShopOrder->address->city }}</td>
                            </tr>
                            <tr>
                                <th>ilçe</th>
                                <td>{{ $ShopOrder->address->state }}</td>
                            </tr>
                            <tr>
                                <th>Posta Kodu </th>
                                <td>{{ $ShopOrder->address->postal_code }}</td>
                            </tr>
                            <tr>
                                <th>Telefon numarası</th>
                                <td>{{ $ShopOrder->address->phone_number }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title box-title-bold">Şipariş Detayları</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tr>
                                <th>İsim </th>
                                <td>{{ $ShopOrder->user->name }}</td>
                            </tr>

                            <tr>
                                <th>Toplam </th>
                                <td>{{ $ShopOrder->order_total }}</td>
                            </tr>
                            <tr>
                                <th>Şipariş durumu </th>
                                <td>{{ $ShopOrder->order_status }}</td>
                            </tr>

                            <tr>
                                <th>Telefon numarası</th>
                                <td>{{ $ShopOrder->address->phone_number }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title box-title-bold">Ürünler</h4>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Resim</th>
                                        <th>Ürün İsim </th>
                                        <th>Adet</th>
                                        <th>Ürün Kodu</th>
                                        <th>Lastik Ebatları</th>

                                    </tr>

                                    @foreach ($ShopOrder->orderDetails as $item)
                                        <tr>
                                            <th width= "20%">
                                                <img src="{{ asset("upload/products/{$item->product->image}") }}"
                                                    width="200px" alt="Fotoğraf">
                                            </th>
                                            <td>{{ $item->product->name }}</td>
                                            <td> {{ $item->product->price }}</td>
                                            <td> {{ $item->product->stock_code }}</td>
                                            <td> {{ $item->product->aspect_ratio . '-' . $item->product->width . '-' . $item->product->rim_diameter }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        </div>




        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('AdminTheme/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/main-dark/js/pages/data-table.js') }}"></script>
@endpush
