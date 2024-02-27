@extends('layout.master')
@section('title', $pagetitle)

@section('main_content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @if (session('fail_update_password'))
                    <div class="col-sm-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('fail_update_password') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                @if (session('success_update_password'))
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success_update_password') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="col-sm-6">
                    <h1 class="m-0">{{ 'Edit Data ' . $pagetitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('userIndex') }}">User</a></li>
                        <li class="breadcrumb-item active">{{ 'edit data ' . strtolower($pagetitle) }}</li>
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
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('userUpdate', $user->id_user) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama Lengkap {{ $pagetitle }} <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->namalengkap_user }}"
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
                                                value="{{ $user->namapanggilan_user }}" name="namapanggilan_user"
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
                                            <input type="text" class="form-control" value="{{ $user->username_user }}"
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
                                            <label>Email {{ $pagetitle }} <span style="color:grey">{{ __('(Opsional)') }}</span></label>
                                            <input type="text" class="form-control" value="{{ $user->email_user }}"
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
                                            <label>Telegram {{ $pagetitle }} <span style="color:grey">{{ __('(Opsional)') }}</span></label>
                                            <input type="text" class="form-control" value="{{ $user->telegram_user }}"
                                                name="telegram_user" id="telegram_user" placeholder="Telegram" maxlength="30" oninput="updateCounter('telegram_user', 'charCount_telegram_user' , 'maxCount_telegram_user')">
                                                <p class="float-sm-right"><span id="charCount_telegram_user">0</span>/<span id="maxCount_telegram_user">0</span></p>
                                            @error('telegram_user')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Roles <span style="color:grey">{{ __('(Opsional)') }}</span></label>
                                            <select class="select2bs4" name="roles[]" multiple="multiple" data-placeholder="Pilih role"
                                                    style="width: 100%;">
                                              @foreach ($roles as $role)
                                                <option value="{{ $role->id_role }}" {{ in_array($role->id_role, $userroles) ? 'selected' : '' }}>{{ $role->nama_role  }} di perusahaan {{ $role->company->nama_company }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div>Created by : {{ $datauser['create'] }} | {{ $user->created_at }}</div>
                                        @if ($datauser['update'] != 0)
                                            <div>Updated by : {{ $datauser['update'] }} | {{ $user->updated_at }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary float-sm-right"><i class="fas fa-save"></i> Ubah</button></a>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Update Password {{ $pagetitle }}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('userUpdatePassword', $user->id_user) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Password {{ $pagetitle }} Baru <span style="color:red">*</span></label>
                                            <input type="password" class="form-control" name="password_user_baru" id="password_user_baru"
                                                placeholder="Masukkan Password Baru" maxlength="30" oninput="updateCounter('password_user_baru', 'charCount_password_user_baru' , 'maxCount_password_user_baru')">
                                                <p class="float-sm-right"><span id="charCount_password_user_baru">0</span>/<span id="maxCount_password_user_baru">0</span></p>
                                            @error('password_user_baru')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Konfirmasi Password {{ $pagetitle }} Baru <span style="color:red">*</span></label>
                                            <input type="password" class="form-control"
                                                name="konfirmasi_password_user_baru" id="konfirmasi_password_user_baru"
                                                placeholder="Masukkan Konfirmasi Password Baru" maxlength="30" oninput="updateCounter('konfirmasi_password_user_baru', 'charCount_konfirmasi_password_user_baru' , 'maxCount_konfirmasi_password_user_baru')">
                                                <p class="float-sm-right"><span id="charCount_konfirmasi_password_user_baru">0</span>/<span id="maxCount_konfirmasi_password_user_baru">0</span></p>
                                            @error('konfirmasi_password_user_baru')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary float-sm-right"><i class="fas fa-key"></i> Update Password</button></a>
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
        updateCounter('email_user', 'charCount_email_user' , 'maxCount_email_user');
        updateCounter('telegram_user', 'charCount_telegram_user' , 'maxCount_telegram_user');

        updateCounter('password_user_baru', 'charCount_password_user_baru' , 'maxCount_password_user_baru');
        updateCounter('konfirmasi_password_user_baru', 'charCount_konfirmasi_password_user_baru' , 'maxCount_konfirmasi_password_user_baru');
    };
</script>
