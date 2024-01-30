@extends('layouts.admin')


@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Kategori Güncelle</h4>
            </div>
            <!-- /.box-header -->
            <form class="form" action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kategori Ad</label>
                                <input type="text" class="form-control" placeholder="kategori" name="name"
                                    value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Kategory Açıklama <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <textarea id="textarea" name="description" class="form-control" required placeholder="">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti-save-alt"></i> Güncelle
                        </button>
                    </div>
            </form>
        </div>
        </div>
    @endsection
