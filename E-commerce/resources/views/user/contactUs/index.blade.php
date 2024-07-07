@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Mesajlar</h3>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Mesaj Listesi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Adı</th>
                                    <th>Soyadı</th>
                                    <th>E-posta</th>
                                    <th>Mesaj</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->id }}</td>
                                    <td>{{ $message->firstName }}</td>
                                    <td>{{ $message->lastName }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ Str::limit($message->message, 50) }}</td>
                                    <td>
                                        @if ($message->is_read)
                                        <span class="label label-success">Okundu</span>
                                        @else
                                        <span class="label label-warning">Okunmadı</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <form id="deleteForm{{ $message->id }}" action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $message->id }}')">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Sil
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Göster
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
    </div>
</section>
@endsection

@push('js')
<script>
    function confirmDelete(id) {
        var result = confirm("Bu mesajı silmek istediğinizden emin misiniz?");

        if (result) {
            // Kullanıcı onayladı, formu gönder
            document.getElementById('deleteForm' + id).submit();
        } else {
            // Kullanıcı iptal etti
        }
    }
</script>
@endpush