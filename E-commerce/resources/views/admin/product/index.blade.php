@extends('layouts.admin')


@section('content')
    <div class="col-12">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Individual column searching</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Fotoğraf</th>
                                <th>Ad</th>
                                <th>Boyut</th>
                                <th>Fiyat</th>
                                <th>Stok</th>
                                <th>Açıklama</th>
                                <th>Kısa Açıklama</th>
                                <th>Durum</th>
                                <th>İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $product->id }}</th>
                                    <th><img src="{{ asset("upload/products/$product->image") }}" width= "200px"
                                            alt="Fotoğraf"></th>
                                    <th>{{ $product->name }}</th>
                                    <th>{{ $product->width . '-' . $product->aspect_ratio . '-' . $product->rim_diameter }}
                                    </th>
                                    <th>{{ $product->price }}</th>
                                    <th>{{ $product->stock }}</th>
                                    <th>{!! $product->description !!}</th>
                                    <th>{{ $product->short_description }}</th>
                                    <th>{{ $product->status ? 'Aktif' : 'Pasif' }}</th>
                                    <th class="d-flex gap-1 justify-content-center">
                                        <form id = "deleteForm" action="{{ route('admin.product.delete', $product->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.product.edit', $product) }}" method="get">

                                            <button type="submit" class="btn btn-primary btn">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                        {{-- // TODO:product silindiğinde foto silinecek --}}

                                    </th>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Fotoğraf</th>
                                <th>Ad</th>
                                <th>Boyut</th>
                                <th>Stok</th>
                                <th>Fiyat</th>
                                <th>Açıklama</th>
                                <th>Kısa Açıklama</th>
                                <th>Durum</th>
                                <th>İşlemler</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{ asset('AdminTheme/assets/vendor_components/datatable/datatables.min.js') }} "></script>
    <script src="{{ asset('AdminTheme/main-dark/js/pages/data-table.js') }} "></script>


    <script>
        function confirmDelete() {
            var result = confirm("Silmek istediğinize Emin misiniz?");

            if (result) {
                // Kullanıcı 'Evet' derse formu gönder
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endpush
