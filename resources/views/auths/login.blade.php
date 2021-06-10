<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - SILATAR</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="shortcut icon" href="{{ asset('style/images/SILATAR.png') }}">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap-select.less') }}"> -->
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style>
        body{
          background-color: grey;
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
        }
      </style>
    
</head>
<body>
    


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                     <br>
                    </a>
                </div>
                <div class="login-form">
                    <div class="text-center">
                    <img src="{{ asset('style/images/SILATAR.png') }}" style="margin-bottom: 10px;" alt="LOGO">
                  
               
                    <h1 class="h4 text-gray-900"><b>Sistem Informasi Pelaporan Kegiatan RT</b></h1>
                    <h1 class="h4 text-gray-900"><b>Kecamatan Balikpapan Timur</b></h1>
                  
                    </div>
                    <form class="form-auth-small" action="/postlogin" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="username" class="control-label sr-only">Username</label>
                            <input name="username" type="text" class="form-control" id="signin-username" placeholder="Username">
                            @error('username')
									<div class="text-danger mt-2">{{ $message }} </div>
								@enderror
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                            @error('password')
									<div class="text-danger mt-2">{{ $message }} </div>
								@enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Masuk</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>


</body>
</html>
