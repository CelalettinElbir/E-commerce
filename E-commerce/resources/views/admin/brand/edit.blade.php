@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Marka Düzenle</h3>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Marka Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <form class="form" action="{{ route('brands.update', $brand->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Marka Ad</label>
                                        <input type="text" class="form-control" placeholder="Marka Adı" name="name"
                                            value="{{ $brand->name }}">

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Açıklama <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea id="textarea" name="description" class="form-control" required placeholder="">{{ $brand->description }}</textarea>
                                    @error('description')
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
    </script>
@endpush
