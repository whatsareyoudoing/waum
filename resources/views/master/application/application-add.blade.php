@extends('layout.master')
@section('title', $pagetitle)

@section('main_content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ 'Tambah Data ' . $pagetitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('applicationIndex') }}">{{ $pagetitle }}</a></li>
                        <li class="breadcrumb-item active">{{ $pagetitle . ' Add' }}</li>
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
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h3 class="card-title">{{ $pagetitle }} Add</h3>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('applicationIndex') }}">
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
                                                    <p>2. Nama di isi huruf bukan angka.</p>
                                                    <p>3. Nama dan Kode tidak boleh kembar.</p>
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
                        <form action="{{ route('applicationSubmit') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Kode {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('kode_application') }}" name="kode_application" id="kode_application" placeholder="Masukkan Kode" maxlength="10" oninput="updateCounter('kode_application', 'charCount_kode_application' , 'maxCount_kode_application')">
                                            
                                            <p class="float-sm-right"><span id="charCount_kode_application">0</span>/<span id="maxCount_kode_application">0</span></p>
                                            @error('kode_application')<p style="color:red">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input onkeydown="return /[a-z,0-9, ]/i.test(event.key)" type="text" class="form-control" value="{{ old('nama_application') }}" name="nama_application" id="nama_application" placeholder="Masukkan Nama" maxlength="150" oninput="updateCounter('nama_application', 'charCount_nama_application' , 'maxCount_nama_application')">
                                            
                                            <p class="float-sm-right"><span id="charCount_nama_application">0</span>/<span id="maxCount_nama_application">0</span></p>
                                            @error('nama_application')<p style="color:red" class="float-sm-left">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary float-sm-right"><i class="fas fa-save"></i> Simpan</button></a>
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
        updateCounter('kode_application', 'charCount_kode_application', 'maxCount_kode_application');
        updateCounter('nama_application', 'charCount_nama_application', 'maxCount_nama_application');
    };
</script>

