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
                        <li class="breadcrumb-item"><a href="{{ route('companyIndex') }}">{{$pagetitle}}</a></li>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- .card-header -->
                        <div class="card-header"> 
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h3 class="card-title">{{ $pagetitle }} Edit</h3>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('companyIndex') }}">
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
                                                    <p>2. Nama Company di isi huruf bukan angka.</p>
                                                    <p>3. Nama Company tidak boleh kembar.</p>
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

                        <form action="{{ route('companyUpdate',$company->id_company) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Kode {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input class="form-control" type="text" value="{{$company->kode_company}}" name="kode_company" id="kode_company" maxlength="5" oninput="updateCounter('kode_company', 'charCount_kode_company' , 'maxCount_kode_company')">
                                            <p class="float-sm-right"><span id="charCount_kode_company">0</span>/<span id="maxCount_kode_company">0</span></p>
                                            @error('kode_company')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$company->nama_company}}" name="nama_company" id="nama_company" maxlength="150" oninput="updateCounter('nama_company', 'charCount_nama_company' , 'maxCount_nama_company')">
                                            <p class="float-sm-right"><span id="charCount_nama_company">0</span>/<span id="maxCount_nama_company">0</span></p>
                                            @error('nama_company')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Pilih Nama Bisnis<span style="color:red">*</span></label>
                                            <select type="text" name="id_business" class="form-control select2bs4" style="width:100% !important;">
                                                @foreach($bussines as $b)
                                                <option value="{{$b->id_business}}" {{$b->id_business==$company->id_business ? 'selected':''}}>{{$b->nama_business}}</option>
                                                @endforeach
                                            </select>
                                            @error('id_business')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Currency {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$company->currency_company}}" name="currency_company" id="currency_company" maxlength="50" oninput="updateCounter('currency_company', 'charCount_currency_company' , 'maxCount_currency_company')">
                                            <p class="float-sm-right"><span id="charCount_currency_company">0</span>/<span id="maxCount_currency_company">0</span></p>
                                            @error('currency_company')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Alamat {{ $pagetitle }} (Opsional)</label>
                                            <input class="form-control" type="text" value="{{$company->alamat_company}}" name="alamat_company" id="alamat_company" maxlength="250" oninput="updateCounter('alamat_company', 'charCount_alamat_company' , 'maxCount_alamat_company')">
                                            <p class="float-sm-right"><span id="charCount_alamat_company">0</span>/<span id="maxCount_alamat_company">0</span></p>
                                            @error('alamat_company')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Telepon {{ $pagetitle }} (Opsional)</label>
                                            <input class="form-control" onkeydown="return /[0-9]$/i.test(event.key)" type="text" value="{{$company->telp_company}}" name="telp_company" id="telp_company" maxlength="20" oninput="updateCounter('telp_company', 'charCount_telp_company' , 'maxCount_telp_company')">
                                            <p class="float-sm-right"><span id="charCount_telp_company">0</span>/<span id="maxCount_telp_company">0</span></p>
                                            @error('telp_company')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Email {{ $pagetitle }} (Opsional)</label>
                                            <input class="form-control" type="email" value="{{$company->email_company}}" name="email_company" id="email_company" maxlength="100" oninput="updateCounter('email_company', 'charCount_email_company' , 'maxCount_email_company')">
                                            <p class="float-sm-right"><span id="charCount_email_company">0</span>/<span id="maxCount_email_company">0</span></p>
                                            @error('email_company')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-sm bg-gradient-dark float-sm-right"><i class="fa-solid fa-floppy-disk"></i> Simpan</button></a>
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
        updateCounter('nama_company', 'charCount_nama_company', 'maxCount_nama_company');
        updateCounter('kode_company', 'charCount_kode_company', 'maxCount_kode_company');
        updateCounter('currency_company', 'charCount_currency_company', 'maxCount_currency_company');
        updateCounter('alamat_company', 'charCount_alamat_company', 'maxCount_alamat_company');
        updateCounter('telp_company', 'charCount_telp_company', 'maxCount_telp_company');
        updateCounter('email_company', 'charCount_email_company', 'maxCount_email_company');
    };
</script>


