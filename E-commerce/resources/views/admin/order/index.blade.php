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
                                        <th>ID</th>
                                        <th>Kullanıcı ID</th>
                                        <th>Adres ID</th>
                                        <th>Sipariş Toplamı</th>
                                        <th>Sipariş detay</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shopOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->address->address_line_1 }}</td>
                                            <td>{{ $order->order_total }}</td>
                                            <td>
                                                <a  href="{{ route('admin.orders.details', $order) }}">Detayları
                                                    Görüntüle</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kullanıcı ID</th>
                                        <th>Adres ID</th>
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
@endpush
