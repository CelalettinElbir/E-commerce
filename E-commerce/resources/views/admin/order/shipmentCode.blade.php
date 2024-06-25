@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Kargo Kodu </h3>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kargo Kodu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-8 mx-auto">


                            <form action="{{ route('admin.orders.createShipmentCode', $ShopOrder) }}" method="POST">
                                @csrf

                                <label>Kargo şirketi</label>
                                <select class="form-control" name="name">
                                    <option selected>Aras Kargo </option>
                                    <option>Yurtiçi Kargo </option>
                                    <option>MNG Kargo </option>
                                </select>
                                <label>Takip Numarasını Giriniz</label>

                                <input type="text" name="name" class="form-control">
                                <label>Kargo Desi </label>
                                <input type="number" name="hint" class="form-control">
                                <button class="btn btn-success btn-block mt-4" type="submit">Kaydet</button>


                            </form>

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
