@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Kargo Kodu</h3>
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

                            <div class="form-group">
                                <label for="name">Kargo Şirketi</label>
                                <select class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                                    <option value="Aras Kargo" {{ old('name') == 'Aras Kargo' ? 'selected' : '' }}>Aras Kargo</option>
                                    <option value="Yurtiçi Kargo" {{ old('name') == 'Yurtiçi Kargo' ? 'selected' : '' }}>Yurtiçi Kargo</option>
                                    <option value="MNG Kargo" {{ old('name') == 'MNG Kargo' ? 'selected' : '' }}>MNG Kargo</option>
                                </select>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tracking_number">Takip Numarasını Giriniz</label>
                                <input type="text" name="tracking_number" id="tracking_number" class="form-control @error('tracking_number') is-invalid @enderror" value="{{ old('tracking_number') }}">
                                @error('tracking_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hint">Kargo Desi</label>
                                <input type="number" name="hint" id="hint" class="form-control @error('hint') is-invalid @enderror" value="{{ old('hint') }}">
                                @error('hint')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Ücret</label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

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