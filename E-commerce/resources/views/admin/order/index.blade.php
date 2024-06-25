@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Mağaza Siparişleri</h3>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mağaza Siparişleri</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width = "30%">Ürün Bilgileri </th>
                                        <th>Sipariş Bilgilerip </th>
                                        <th>
                                            Kargo Bilgileri
                                        </th>
                                        <th>sipariş durumu</th>
                                        <th>Sipariş Toplamı</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($shopOrders as $order)
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        @foreach ($order->orderDetails as $detail)
                                                            <img src="{{ asset('upload/products/' . $detail->product->image) }}"
                                                                alt="Product Image">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>{{ $detail->product->name }}</h5>
                                                        <p>{{ $detail->product->stock_code }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                        <td>
                                            <h5>Sipariş no:{{ $order->id }}</h5>
                                            <p>
                                                {{ $order->user->name }}
                                            </p>
                                            <small> {{ $order->created_at }}</small>
                                        </td>
                                        <td>{{ $order->address->address_line_1 }}</td>
                                        <td><span class="badge badge-pill badge-danger">
                                                {{ $status[$order->status] }}
                                            </span>
                                        </td>
                                        <td>{{ $order->order_total }}</td>


                                        <td class="d-flex  ">
                                            <a class="btn btn-primary" href="{{ route('admin.orders.details', $order) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i></a>

                                            @if ($order->status == 'pending')
                                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <select name="status">
                                                        <option value="pending">Beklemede</option>
                                                        <option value="processing">İşleniyor</option>
                                                    </select>

                                                    <button type="submit" class="btn btn-primary">Durumu Güncelle</button>
                                                </form>
                                            @elseif($order->status == 'processing')
                                                <a class="btn btn-info"
                                                    href="{{ route('admin.orders.ShipmentCode', $order) }}"><i
                                                        class="fa fa-truck" aria-hidden="true"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kullanıcı ID</th>
                                        <th>Adres ID</th>
                                        <th>Sipariş durumu</th>
                                        <th>Sipariş Toplamı</th>
                                        <th>Sipariş detay</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('AdminTheme/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/main-dark/js/pages/data-table.js') }}"></script>
    <script>
        function confirmDelete() {
            var result = confirm("Silmek istediğinize Emin misiniz?");
            if (result) {
                // Kullanıcı 'Evet' derse formu gönder
                document.getElementById('deleteForm').submit();
            } else {


            }
        }


        Swal.fire("SweetAlert2 is working!");
    </script>
@endpush
