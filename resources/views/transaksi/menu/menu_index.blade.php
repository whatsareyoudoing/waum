@extends('layout.master')
@section('title', $pagetitle)

@section('main_content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pagetitle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $pagetitle }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @if (session('status'))
                        <div class="alert alert-success fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h3 class="card-title">{{ $pagetitle }} View</h3>
                                </div>
                                <div class="col-sm-6 float-sm-right">
                                    <a href="{{ route('menuAdd') }}"><button type="button"
                                            class="btn btn-primary float-sm-right"><i class="fa fa-plus"></i> Tambah
                                            Data</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama {{ $pagetitle }}</th>
                                        <th>Nama Aplikasi</th>
                                        <th>Kode {{ $pagetitle }}</th>
                                        <th>Url {{ $pagetitle }}</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $row => $value)
                                        <tr>
                                            <td>{{ $value->nama_menu }}</td>
                                            <td>{{ $value->applications->nama_application }}</td>
                                            <td>{{ $value->kode_menu }}</td>
                                            <td>{{ $value->url_menu }}</td>
                                            <td>
                                                <a href="{{route('menuEdit',$value->id_menu)}}"
                                                    class="btn btn-primary"><i class="fa fa-pencil-alt"
                                                        title="Edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama {{ $pagetitle }}</th>
                                        <th>Nama Aplikasi</th>
                                        <th>Kode {{ $pagetitle }}</th>
                                        <th>Url {{ $pagetitle }}</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
