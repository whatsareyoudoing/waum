@extends('layout.master')
@section('title', $pagetitle)

@section('main_content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ 'Edit Data ' . $pagetitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('businessIndex') }}">Business</a></li>
                        <li class="breadcrumb-item active">{{ $pagetitle.' Edit' }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row w-50">
                <div class="col-12">
                    <div class="card">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h3 class="card-title">{{ $pagetitle }} Edit</h3>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('businessIndex') }}">
                                        <button type="button" class="btn btn-dark">
                                            <i class="fas fa-arrow-circle-left" style="color: #ffc800;"></i> Back
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
                                        <i class="fas fa-info-circle" style="color: #ffc800;"></i> Rule
                                    </button>
                                    <div class="modal fade" id="modal-lg">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ketentuan input data sebagai berikut :</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>1. Tanda ( <span style="color:red">*</span> ) wajib diisi.</p>
                                                    <p>2. Nama Business di isi huruf bukan angka.</p>
                                                    <p>3. Nama Business kembar.</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                   <p>Ikuti ketentuan di atas agar data dapat tersimpan dengan baik.</p>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form action="{{ route('businessUpdate',$business->id_business) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" class="form-control" value="{{ $business->nama_business }}" name="nama_business" id="nama_business" placeholder="Nama" maxlength="150" oninput="updateCounter('nama_business', 'charCount_nama_business' , 'maxCount_nama_business')">
                                            <p class="float-sm-right"><span id="charCount_nama_business">0</span>/<span id="maxCount_nama_business">0</span></p>
                                            @error('nama_business')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div>Created by : {{ $datauser['create']}} | {{ $business->created_at }}</div>
                                        @if($datauser['update']!=0)
                                        <div>Updated by : {{ $datauser['update']}} | {{ $business->updated_at }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-sm bg-gradient-dark float-sm-right"><i class="fa-solid fa-floppy-disk"></i> Ubah</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<script>
    function updateCounter(inputId, charCountId, maxCountId) {
        var inputElement = document.getElementById(inputId);
        var charCountElement = document.getElementById(charCountId);
        var maxCountElement = document.getElementById(maxCountId);

        charCountElement.innerText = inputElement.value.length;
        maxCountElement.innerText = inputElement.getAttribute('maxlength');
    }

    window.onload = function() {
        updateCounter('nama_business', 'charCount_nama_business', 'maxCount_nama_business');
    };
</script>