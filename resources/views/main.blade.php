<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - SILATAR</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styleassets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    
    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                @if(auth()->user()->role == 'Kecamatan/Kelurahan')
                <a class="navbar-brand" href="{{ url('dashboard') }}">SILATAR</a>
                @endif
                @if(auth()->user()->role == 'RT')
                <a class="navbar-brand" href="">SILATAR</a>
                @endif
                <a class="navbar-brand hidden" href="">S</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(auth()->user()->role == 'RT')
                    <li> <a href="{{ url('laporan') }}"> <i class="menu-icon fa fa-dashboard"></i>Laporan </a> </li>
                    @endif
                    @if(auth()->user()->role == 'Kecamatan/Kelurahan')
                    <li> <a href="{{ url('akunrt') }}"> <i class="menu-icon fa fa-puzzle-piece"></i>Akun RT </a> </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{auth()->user()->nama}}</span>  <img src="{{asset ('klorofil/assets/img/admin.jpg') }}" style="width:35px;height:35px;" class="rounded-circle"> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <div class="user-menu dropdown-menu">
                            @if(auth()->user()->role == 'RT')
                            <a class="nav-link" href="{{ url('password') }}"><i class="fa fa -cog"></i>Ubah kata sandi</a>
                            <a class="nav-link" href="{{ url('informasi') }}"><i class="fa fa-power -cog"></i>Informasi</a>
                            @endif
                            <a class="nav-link" href="{{ url('logout') }}"><i class="fa fa-power -off"></i>Keluar</a>
                        </div>
                    </div>

                    

                </div>
            </div>

        </header><!-- /header -->

        @yield('breadcrumbs')

        @yield('content')

        @stack('scripts')

    <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/datatables-init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     @stack('scripts')
</body>
</html>
