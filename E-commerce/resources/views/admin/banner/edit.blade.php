@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Banner Düzenle</h3>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12 ">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Banner Düzenle</h3>
                </div>
                <!-- /.box-header -->
                <form class="form" action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" class="form-control" placeholder="Başlık" name="title" value="{{ $banner->title }}">

                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Açıklama <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea id="textarea" name="description" class="form-control" required placeholder="">{{ $banner->description }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Mevcut Resim</h5>
                            <div class="controls">
                                <img src="{{ asset($banner->image_path) }}" alt="Banner Resmi" id="bannerImage" width="320">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Yeni Resim</h5>
                            <div class="controls">
                                <input type="file" class="form-control" name="image" onchange="previewImage(event)">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Link <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="url" class="form-control" name="link" value="{{ $banner->link }}" required>
                                @error('link')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-rounded btn-primary">
                                <i class="ti-save-alt"></i> Kaydet
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    function confirmDelete() {
        var result = confirm("Silmek istediğinize emin misiniz?");

        if (result) {
            // Kullanıcı 'Evet' derse formu gönder
            document.getElementById('deleteForm').submit();
        } else {
            // Kullanıcı 'Hayır' derse bir şey yapma
        }
    }



    function previewImage(event) {
        var output = document.getElementById('bannerImage');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // Free up memory
        }
    }
</script>
@endpush