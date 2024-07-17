@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Bannerlar</h3>
        </div>
    </div>
</div>
<section class="content">
    <div class="row ">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Bannerlar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Resim</th>

                                    <th>Başlık</th>
                                    <th>Açıklama</th>
                                    <th>Link</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                <tr>
                                    <th>{{ $banner->id }}</th>
                                    <th><img src="{{ asset("$banner->image_path") }}" width="200px" alt="Fotoğraf"></th>

                                    <th>{{ $banner->title }}</th>
                                    <th>{{ $banner->description }}</th>
                                    <th>{{ $banner->link }}</th>
                                    <th class="d-flex gap-1 justify-content-center">
                                        <form id="deleteForm-{{ $banner->id }}" action="{{ route('banners.destroy', $banner->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn" onclick="confirmDelete('{{$banner->id}}')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route('banners.edit', $banner->id) }}" method="get">
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
                                    <th>Resim</th>
                                    <th>Başlık</th>
                                    <th>Açıklama</th>
                                    <th>Link</th>
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
                    <h4 class="box-title">Banner oluştur</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" class="form-control" placeholder="Banner Başlığı" name="title">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Açıklama <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea id="textarea" name="description" class="form-control" required placeholder="Açıklama"></textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Resim</label>
                            <input type="file" class="form-control" name="image_path" required>
                            @error('image_path')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="url" class="form-control" placeholder="https://example.com" name="link" required>
                            @error('link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.box-body -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-rounded btn-primary ">
                                <i class="ti-save-alt"></i> Kaydet
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="{{ asset('AdminTheme/assets/vendor_components/datatable/datatables.min.js') }} "></script>
<script src="{{ asset('AdminTheme/main-dark/js/pages/data-table.js') }} "></script>

<script>
    function confirmDelete(id) {
        var result = confirm("Silmek istediğinize emin misiniz?");
        if (result) {
            // Kullanıcı 'Evet' derse formu gönder
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
@endpush