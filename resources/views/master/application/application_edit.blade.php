<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('applicationUpdate',$application->id_application) }}" method="POST">
        @csrf
        <ul>
            <li>
                <label for="">Kode</label>
                <input type="text" value="{{$application->kode_application}}" name="kode_application">
            </li>
            <li>
                <label for="">Nama</label>
                <input type="text" value="{{$application->nama_application}}" name="nama_application">
            </li>
            <li>
                <button type="submit">Update</button>
            </li>
        </ul>
    </form>
</body>

</html>
