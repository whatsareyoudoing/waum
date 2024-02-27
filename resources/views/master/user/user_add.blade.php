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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ 'tambah data ' . strtolower($pagetitle) }}</li>
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
                                    <a href="{{ route('userIndex') }}">
                                        <button type="button" class="btn btn-dark">
                                            <i class="fas fa-arrow-circle-left" style="color: #ffc800;"></i> Back
                                        </button>
                                    </a>
                                    {{-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('userSubmit') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama Lengkap {{ $pagetitle }} <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('namalengkap_user') }}"
                                                name="namalengkap_user" id="namalengkap_user" placeholder="Nama Lengkap" maxlength="150" oninput="updateCounter('namalengkap_user', 'charCount_namalengkap_user' , 'maxCount_namalengkap_user')" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)">
                                            <p class="float-sm-right"><span id="charCount_namalengkap_user">0</span>/<span id="maxCount_namalengkap_user">0</span></p>
                                            @error('namalengkap_user')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama Panggilan {{ $pagetitle }} <span style="color:red">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('namapanggilan_user') }}" name="namapanggilan_user"
                                                id="namapanggilan_user" placeholder="Nama Panggilan" maxlength="25" oninput="updateCounter('namapanggilan_user', 'charCount_namapanggilan_user' , 'maxCount_namapanggilan_user')" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)">
                                                <p class="float-sm-right"><span id="charCount_namapanggilan_user">0</span>/<span id="maxCount_namapanggilan_user">0</span></p>
                                            @error('namapanggilan_user')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Username {{ $pagetitle }} <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('username_user') }}"
                                                name="username_user" id="username_user" placeholder="Username" maxlength="50" oninput="updateCounter('username_user', 'charCount_username_user' , 'maxCount_username_user')">
                                                <p class="float-sm-right"><span id="charCount_username_user">0</span>/<span id="maxCount_username_user">0</span></p>
                                            @error('username_user')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Password {{ $pagetitle }} <span style="color:red">*</span></label>
                                            <input type="password" class="form-control" value="{{ old('password') }}"
                                                name="password" id="password" placeholder="Password" maxlength="50" oninput="updateCounter('password', 'charCount_password' , 'maxCount_password')">
                                                <p class="float-sm-right"><span id="charCount_password">0</span>/<span id="maxCount_password">0</span></p>
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Email {{ $pagetitle }} <span style="color:grey">(Opsional)</span></label>
                                            <input type="text" class="form-control" value="{{ old('email_user') }}"
                                                name="email_user" id="email_user" placeholder="Email" maxlength="150" oninput="updateCounter('email_user', 'charCount_email_user' , 'maxCount_email_user')">
                                                <p class="float-sm-right"><span id="charCount_email_user">0</span>/<span id="maxCount_email_user">0</span></p>
                                            @error('email_user')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Telegram {{ $pagetitle }} <span style="color:grey">(Opsional)</span></label>
                                            <input type="text" class="form-control" value="{{ old('telegram_user') }}"
                                                name="telegram_user" id="telegram_user" placeholder="Telegram" maxlength="30" oninput="updateCounter('telegram_user', 'charCount_telegram_user' , 'maxCount_telegram_user')">
                                                <p class="float-sm-right"><span id="charCount_telegram_user">0</span>/<span id="maxCount_telegram_user">0</span></p>
                                            @error('telegram_user')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
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
        updateCounter('namalengkap_user', 'charCount_namalengkap_user' , 'maxCount_namalengkap_user');
        updateCounter('namapanggilan_user', 'charCount_namapanggilan_user' , 'maxCount_namapanggilan_user');
        updateCounter('username_user', 'charCount_username_user' , 'maxCount_username_user');
        updateCounter('password', 'charCount_password' , 'maxCount_password');
        updateCounter('email_user', 'charCount_email_user' , 'maxCount_email_user');
        updateCounter('telegram_user', 'charCount_telegram_user' , 'maxCount_telegram_user');
    };
</script>
