<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=REM:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,600" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>{{ env('APP_NAME') }}</title>
</head>
<style>
    h1,
h2,
h3,
h4,
h5 {
    font-family: 'Poppins';
    font-weight:bold;

}
body{
    font-family:'Poppins';
}
.button-default:hover{
    background-color:#176B87;
    color:#fff;
}
.button-default{
    background-color:#64CCC5;
    color:#fff;
}
</style>

<body class="p-5">
    <div class="container-sm mt-5" style="max-width:600px;">
        <div class="row">
            <div class="col-sm-12 p-3 shadow-lg" style="min-height:400px; border-radius:20px;">
                <div class="mx-5 pt-4 my-4">
                    <h2 class="mb-4">{{ env('APP_NAME') }}</h2>
                    <form action="{{url('login')}}" method="post">
                    @csrf
                    <div class="mb-3 w-100">
                        </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text look-pw bg-white border-end-0 d-flex justify-content-center" style="width:13%; font-size:21px;"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" name="username_user" style="height:50px;" placeholder="Masukkan Username"autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text look-pw bg-white border-end-0 d-flex justify-content-center" style="width:13%; font-size:21px;"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control border-end-0" style="height:50px;" name="password" id="password" placeholder="Masukkan Password">
                        <span class="input-group-text look-pw bg-white border-start-0"><i class="fa-solid fa-eye"></i></span>
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn button-default fw-bold w-100 mt-4" style="height:50px;">Login</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>


</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $('.look-pw').on('click',function(){
            let input = $("#password");
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password');
            input.attr('type') === 'password' ? $(this).html('<i class="fa-solid fa-eye"></i>') : $(this).html('<i class="fa-solid fa-eye-slash"></i>');
        });
    </script>
</html>
