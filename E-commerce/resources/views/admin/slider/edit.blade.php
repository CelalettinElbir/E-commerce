@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Slider Düzenle</h3>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <form class="form" action="{{ route('slider.update', $slider->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title"
                                    value="{{ $slider->title }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="description">{{ $slider->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                                <img src="{{ asset($slider->slider_img) }}" alt="Slider Image"
                                    style="max-width: 200px; margin-top: 10px;">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
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
            var result = confirm("Are you sure you want to delete?");

            if (result) {
                // Submit the form if the user confirms
                document.getElementById('deleteForm').submit();
            } else {
                // Do nothing if the user cancels
            }
        }
    </script>
@endpush
