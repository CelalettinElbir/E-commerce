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
                                    <th width="30%">Ürün Bilgileri</th>
                                    <th>Sipariş Bilgileri</th>
                                    <th>Kargo Bilgileri</th>
                                    <th>Sipariş durumu</th>
                                    <th>Sipariş Toplamı</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shopOrders as $order)
                                <tr>
                                    <td>
                                        <div class="row">
                                            @foreach ($order->orderDetails as $detail)
                                            <div class="col-md-4">
                                                <img src="{{ asset('upload/products/' . $detail->product->image) }}" alt="Product Image" width="100">
                                            </div>
                                            <div class="col-md-8">
                                                <h5>{{ $detail->product->name }}</h5>
                                                <p>{{ $detail->product->stock_code }}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Sipariş no: {{ $order->id }}</h5>
                                        <p>{{ $order->user->name }}</p>
                                        <small>{{ $order->created_at }}</small>
                                    </td>
                                    <td>{{ $order->address->address_line_1 }}</td>
                                    <td>
                                        <span class="badge badge-pill badge-danger">{{ $status[$order->status] }}</span>
                                    </td>
                                    <td>{{ $order->order_total }}</td>
                                    <td class="d-flex justify-content-center  align-items-center">
                                        <a class="btn btn-primary  mr-4" href="{{ route('admin.orders.details', $order) }}" title="Detaylar">
                                            <i data-feather="eye"></i>
                                        </a>

                                        @if ($order->status == 'pending')
                                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex justify-content-around  ">
                                            @csrf
                                            @method('PUT')

                                            <select name="status" class="form-control ">
                                                <option value="pending">Beklemede</option>
                                                <option value="processing">İşleniyor</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary ">Güncelle</button>
                                        </form>
                                        @elseif($order->status == 'processing')
                                        <div class="d-flex align-items-center">
                                            <a class="btn btn-info btn" href="{{ route('admin.orders.ShipmentCode', $order) }}" title="Kargo Kodu">
                                                <i data-feather="truck"></i>
                                            </a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Ürün Bilgileri</th>
                                    <th>Sipariş Bilgileri</th>
                                    <th>Kargo Bilgileri</th>
                                    <th>Sipariş durumu</th>
                                    <th>Sipariş Toplamı</th>
                                    <th>İşlemler</th>
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
            document.getElementById('deleteForm').submit();
        }
    }

    // Feather icons replacement
    feather.replace();

    // Initialize datatable
    $(document).ready(function() {
        $('#example5').DataTable();
    });

    // Example SweetAlert2 usage
</script>
@endpush