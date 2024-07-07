@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Mesaj Detayı</h3>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Mesaj Detayı</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 200px;">Mesaj ID</th>
                                    <td>{{ $message->id }}</td>
                                </tr>
                                <tr>
                                    <th>Adı</th>
                                    <td>{{ $message->firstName }}</td>
                                </tr>
                                <tr>
                                    <th>Soyadı</th>
                                    <td>{{ $message->lastName }}</td>
                                </tr>
                                <tr>
                                    <th>E-posta</th>
                                    <td>{{ $message->email }}</td>
                                </tr>
                                <tr>
                                    <th>Mesaj</th>
                                    <td style="max-width: 600px; word-wrap: break-word;">{{ $message->message }}</td>
                                </tr>
                                <tr>
                                    <th>Durum</th>
                                    <td>
                                        @if ($message->is_read)
                                        <span class="label label-success">Okundu</span>
                                        @else
                                        <span class="label label-warning">Okunmadı</span>
                                        @endif
                                    </td>
                                </tr>
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