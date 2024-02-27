@extends('layout.master')
@section('title', $pagetitle)

@section('main_content')    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="m-0">{{ $pagetitle }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
                              <a href="{{route('businessAdd')}}"><button type="button" class="btn btn-primary float-sm-right"><i class="fa fa-plus"></i> Tambah Data</button></a>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama {{ $pagetitle }}</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($businesses as $row => $value)
                                        <tr>
                                            <td>{{ $value->nama_business }}</td>       
                                            <td class="d-flex justify-content-center">
                                                <a href="{{route('businessEdit',$value->id_business)}}" class="mx-2 btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach  
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama {{ $pagetitle }}</th>
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
