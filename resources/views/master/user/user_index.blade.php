@extends('layout.master')
@section('title', $pagetitle)

@section('main_content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @if (session('status'))
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pagetitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $pagetitle }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h3 class="card-title">{{ $pagetitle }} View</h3>
                                </div>
                                <div class="col-sm-6 float-sm-right">
                                    <a href="{{ route('userAdd') }}"><button type="button"
                                            class="btn btn-primary float-sm-right"><i class="fa fa-plus"></i> Tambah
                                            Data</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap {{ $pagetitle }}</th>
                                        <th>Nama Panggilan {{ $pagetitle }}</th>
                                        <th>Username {{ $pagetitle }}</th>
                                        <th>Email {{ $pagetitle }}</th>
                                        <th>Telegram {{ $pagetitle }}</th>
                                        <th>Flagaktif {{ $pagetitle }}</th>
                                        <th>Roles {{ $pagetitle }}</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $row => $value)
                                        <tr>
                                            <td>{{ $value->namalengkap_user }}</td>
                                            <td>{{ $value->namapanggilan_user }}</td>
                                            <td>{{ $value->username_user }}</td>
                                            <td>{{ $value->email_user }}</td>
                                            <td>{{ $value->telegram_user }}</td>
                                            <td>{{ $value->flagaktif_user }}</td>
                                            <td>
                                                {{ $value->roles->isEmpty() ? 'Belum memiliki role' : 'Memiliki ' . count($value->roles) . ' role'}}
                                                {{-- <ul>
                                                    @foreach ($value->roles as $role )
                                                        <li>
                                                            {{ $role->nama_role }} di perusahaan {{ $role->company->nama_company }}
                                                        </li>
                                                    @endforeach
                                                </ul> --}}
                                            </td>
                                            <td>
                                                <a href="{{ route('userEdit', $value->id_user) }}"
                                                    class="mx-2 btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Lengkap {{ $pagetitle }}</th>
                                        <th>Nama Panggilan {{ $pagetitle }}</th>
                                        <th>Username {{ $pagetitle }}</th>
                                        <th>Email {{ $pagetitle }}</th>
                                        <th>Telegram {{ $pagetitle }}</th>
                                        <th>Flagaktif {{ $pagetitle }}</th>
                                        <th>Roles {{ $pagetitle }}</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
