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
                        <li class="breadcrumb-item"><a href="{{ route('menuIndex') }}">{{$pagetitle}}</a></li>
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
                                    <a href="{{ route('menuIndex') }}">
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
                                                    <p>2. Nama menu di isi huruf bukan angka.</p>
                                                    <p>3. Nama menu tidak boleh kembar.</p>
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

                        <form action="{{route('menuUpdate',$menu->id_menu)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Kode {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input class="form-control" type="text" value="{{$menu->kode_menu}}" name="kode_menu" id="kode_menu" maxlength="50" oninput="updateCounter('kode_menu', 'charCount_kode_menu' , 'maxCount_kode_menu')">
                                            <p class="float-sm-right"><span id="charCount_kode_menu">0</span>/<span id="maxCount_kode_menu">0</span></p>
                                            @error('kode_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->nama_menu}}" name="nama_menu" id="nama_menu" maxlength="150" oninput="updateCounter('nama_menu', 'charCount_nama_menu' , 'maxCount_nama_menu')">
                                            <p class="float-sm-right"><span id="charCount_nama_menu">0</span>/<span id="maxCount_nama_menu">0</span></p>
                                            @error('nama_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>URL {{ $pagetitle }}<span style="color:red">*</span></label>
                                            <input class="form-control" type="text" value="{{$menu->url_menu}}" name="url_menu" id="url_menu" maxlength="50" oninput="updateCounter('url_menu', 'charCount_url_menu' , 'maxCount_url_menu')">
                                            <p class="float-sm-right"><span id="charCount_url_menu">0</span>/<span id="maxCount_url_menu">0</span></p>
                                            @error('url_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Pilih Nama Application<span style="color:red">*</span></label>
                                            <select type="text" name="id_application" class="form-control select2bs4" style="width:100% !important;">
                                                @foreach($application as $b)
                                                <option value="{{$b->id_application}}" {{$b->id_application == $menu->id_application ? 'selected' :''}}>{{$b->nama_application}}</option>
                                                @endforeach
                                            </select>
                                            @error('id_application')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 1</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother1label_menu}}" name="canother1label_menu" id="canother1label_menu" maxlength="50" oninput="updateCounter('canother1label_menu', 'charCount_canother1label_menu' , 'maxCount_canother1label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother1label_menu">0</span>/<span id="maxCount_canother1label_menu">0</span></p>
                                            @error('canother1label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 2</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother2label_menu}}" name="canother2label_menu" id="canother2label_menu" maxlength="50" oninput="updateCounter('canother2label_menu', 'charCount_canother2label_menu' , 'maxCount_canother2label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother2label_menu">0</span>/<span id="maxCount_canother2label_menu">0</span></p>
                                            @error('canother2label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 3</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother3label_menu}}" name="canother3label_menu" id="canother3label_menu" maxlength="50" oninput="updateCounter('canother3label_menu', 'charCount_canother3label_menu' , 'maxCount_canother3label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother3label_menu">0</span>/<span id="maxCount_canother3label_menu">0</span></p>
                                            @error('canother3label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 4</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother4label_menu}}" name="canother4label_menu" id="canother4label_menu" maxlength="50" oninput="updateCounter('canother4label_menu', 'charCount_canother4label_menu' , 'maxCount_canother4label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother4label_menu">0</span>/<span id="maxCount_canother4label_menu">0</span></p>
                                            @error('canother4label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 5</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother5label_menu}}" name="canother5label_menu" id="canother5label_menu" maxlength="50" oninput="updateCounter('canother5label_menu', 'charCount_canother5label_menu' , 'maxCount_canother5label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother5label_menu">0</span>/<span id="maxCount_canother5label_menu">0</span></p>
                                            @error('canother5label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 6</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother6label_menu}}" name="canother6label_menu" id="canother6label_menu" maxlength="50" oninput="updateCounter('canother6label_menu', 'charCount_canother6label_menu' , 'maxCount_canother6label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother6label_menu">0</span>/<span id="maxCount_canother6label_menu">0</span></p>
                                            @error('canother6label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 7</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother7label_menu}}" name="canother7label_menu" id="canother7label_menu" maxlength="50" oninput="updateCounter('canother7label_menu', 'charCount_canother7label_menu' , 'maxCount_canother7label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother7label_menu">0</span>/<span id="maxCount_canother7label_menu">0</span></p>
                                            @error('canother7label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 8</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother8label_menu}}" name="canother8label_menu" id="canother8label_menu" maxlength="50" oninput="updateCounter('canother8label_menu', 'charCount_canother8label_menu' , 'maxCount_canother8label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother8label_menu">0</span>/<span id="maxCount_canother8label_menu">0</span></p>
                                            @error('canother8label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 9</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother9label_menu}}" name="canother9label_menu" id="canother9label_menu" maxlength="50" oninput="updateCounter('canother9label_menu', 'charCount_canother9label_menu' , 'maxCount_canother9label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother9label_menu">0</span>/<span id="maxCount_canother9label_menu">0</span></p>
                                            @error('canother9label_menu')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Label {{ $pagetitle }} 10</label>
                                            <input class="form-control" onkeydown="return /[a-zA-Z, ]$/i.test(event.key)" type="text" value="{{$menu->canother10label_menu}}" name="canother10label_menu" id="canother10label_menu" maxlength="50" oninput="updateCounter('canother10label_menu', 'charCount_canother10label_menu' , 'maxCount_canother10label_menu')">
                                            <p class="float-sm-right"><span id="charCount_canother10label_menu">0</span>/<span id="maxCount_canother10label_menu">0</span></p>
                                            @error('canother10label_menu')<p class="text-danger">{{ $message }}</p>@enderror
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

    <!-- MenuRole content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Menu Role</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form action="{{route('menuRole',$menu->id_menu)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-responsive-lg">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Read</th>
                                                <th scope="col">Insert</th>
                                                <th scope="col">Update</th>
                                                <th scope="col">Delete</th>
                                                <th scope="col">CO 1</th>
                                                <th scope="col">CO 2</th>
                                                <th scope="col">CO 3</th>
                                                <th scope="col">CO 4</th>
                                                <th scope="col">CO 5</th>
                                                <th scope="col">CO 6</th>
                                                <th scope="col">CO 7</th>
                                                <th scope="col">CO 8</th>
                                                <th scope="col">CO 9</th>
                                                <th scope="col">CO 10</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($role as $r => $i)
                                              <tr>
                                                <th scope="row">{{$r+1}}</th>
                                                <td>
                                                    {{$i->nama_role}}
                                                    <input type="hidden" value="{{$i->id_role}}" name="input_array[{{$r}}][id_role]">
                                                    <input type="hidden" value="{{$menu->id_menu}}" name="input_array[{{$r}}][id_menu]">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canread]" value='1'  @if($i->menurole!=null){{ $i->menurole->canread=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][caninsert]" value='1' @if($i->menurole!=null){{ $i->menurole->caninsert=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canupdate]" value='1' @if($i->menurole!=null){{ $i->menurole->canupdate=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][candelete]" value='1' @if($i->menurole!=null){{ $i->menurole->candelete=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother1]" value='1' @if($i->menurole!=null){{ $i->menurole->canother1=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother2]" value='1' @if($i->menurole!=null){{ $i->menurole->canother2=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother3]" value='1' @if($i->menurole!=null){{ $i->menurole->canother3=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother4]" value='1' @if($i->menurole!=null){{ $i->menurole->canother4=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother5]" value='1' @if($i->menurole!=null){{ $i->menurole->canother5=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother6]" value='1' @if($i->menurole!=null){{ $i->menurole->canother6=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother7]" value='1' @if($i->menurole!=null){{ $i->menurole->canother7=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother8]" value='1' @if($i->menurole!=null){{ $i->menurole->canother8=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother9]" value='1' @if($i->menurole!=null){{ $i->menurole->canother9=='1' ? 'checked':''}} @endif>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="input_array[{{$r}}][canother10]" value='1' @if($i->menurole!=null){{ $i->menurole->canother10=='1' ? 'checked':''}} @endif>
                                                </td>

                                              </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
        updateCounter('nama_menu', 'charCount_nama_menu', 'maxCount_nama_menu');
        updateCounter('url_menu', 'charCount_url_menu', 'maxCount_url_menu');
        updateCounter('kode_menu', 'charCount_kode_menu', 'maxCount_kode_menu');
        updateCounter('canother1label_menu', 'charCount_canother1label_menu', 'maxCount_canother1label_menu');
        updateCounter('canother2label_menu', 'charCount_canother2label_menu', 'maxCount_canother2label_menu');
        updateCounter('canother3label_menu', 'charCount_canother3label_menu', 'maxCount_canother3label_menu');
        updateCounter('canother4label_menu', 'charCount_canother4label_menu', 'maxCount_canother4label_menu');
        updateCounter('canother5label_menu', 'charCount_canother5label_menu', 'maxCount_canother5label_menu');
        updateCounter('canother6label_menu', 'charCount_canother6label_menu', 'maxCount_canother6label_menu');
        updateCounter('canother7label_menu', 'charCount_canother7label_menu', 'maxCount_canother7label_menu');
        updateCounter('canother8label_menu', 'charCount_canother8label_menu', 'maxCount_canother8label_menu');
        updateCounter('canother9label_menu', 'charCount_canother9label_menu', 'maxCount_canother9label_menu');
        updateCounter('canother10label_menu', 'charCount_canother10label_menu', 'maxCount_canother10label_menu');
    };
</script>

