@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Sliderlar</h3>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sliderlar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td><img src="{{ asset('upload/slider/' . $slider->slider_img) }}" alt="{{ $slider->title }}" style="max-width: 150px;"></td>

                                    <td>
                                        <form id="deleteForm" action="{{ route('slider.destroy', $slider->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn" onclick="confirmDelete()">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary btn">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="box">

                <div class="box-header">

                    <h3 class="box-title">Ekle</h3>

                </div>

                <form class="form" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Başlık">
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Fotoğraf</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
        var result = confirm("Silmek istediğinize emin misiniz?");

        if (result) {
            // Kullanıcı 'Evet' derse formu gönder
            document.getElementById('deleteForm').submit();
        } else {
            // Kullanıcı 'Hayır' derse işlemi iptal et
        }
    }
</script>
@endpush