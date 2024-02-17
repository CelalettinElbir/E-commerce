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
                                        <th>sipariş durumu</th>
                                        <th>Sipariş Toplamı</th>
                                        <th>Sipariş detay</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pendingOrders)
                                        @foreach ($pendingOrders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->address->address_line_1 }}</td>
                                                <td><span class="badge badge-pill badge-danger">
                                                        {{ $status[$order->status] }}
                                                    </span>
                                                </td>
                                                <td>{{ $order->order_total }}</td>
                                                <td>
                                                    <a href="{{ route('admin.orders.details', $order) }}"
                                                        class="btn btn-primary" title="Detay"><i class="fa fa-eye"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

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
@endpush
