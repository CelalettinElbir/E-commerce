@extends('layouts.admin')


@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Markalar</h3>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row ">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Markalar</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Marka Ad</th>
                                        <th>Açıklama</th>
                                        <th>İşlemler</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <th>{{ $brand->id }}</th>
                                            <th>{{ $brand->name }}</th>
                                            <th>{{ $brand->description }}</th>
                                            <th class="d-flex gap-1 justify-content-center">
                                                <form id = "deleteForm" action="{{ route('brands.destroy', $brand->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn"
                                                        onclick="confirmDelete()">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>

                                                <form action="{{ route('brands.edit', $brand->id) }}" method="get">
                                                    <button type="submit" class="btn btn-primary btn">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Marka Ad</th>
                                        <th>Açıklama</th>
                                        <th>İşlemler</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Marka oluştur</h4>
                    </div>
                    <!-- /.box-header -->
                    <form class="form" action="{{ route('brands.store') }}" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Marka Ad</label>
                                        <input type="text" class="form-control" placeholder="kategori" name="name">

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>



                            </div>
                            <div class="form-group">
                                <h5>Açıklama <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea id="textarea" name="description" class="form-control" required placeholder=""></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <!-- /.box-body -->
                            <div class="text-right">

                                <button type="submit" class="btn btn-rounded btn-primary ">
                                    <i class="ti-save-alt"></i> Save
                                </button>
                            </div>

                    </form>
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
                } else {


                }
            }
        </script>
    @endpush


    
