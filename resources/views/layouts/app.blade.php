<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv=expires content="-1">
    <meta http-equiv=Pragma content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Banmedical - Intranet | @yield('title')</title>
    <link rel="icon" type="image/png" href="assets/img/icono-chancha.png" />
    <link type="image/x-icon" href="{{asset('assets/img/logo-color.png')}}" rel="icon" />
    <link type="image/x-icon" href="{{asset('assets/img/logo-color.png')}}" rel="shortcut icon" />
    <meta name="theme-color" content="#003C71">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/boot-dev.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
</head>
<nav  id="menu_principal" class="d-lg-none d-block navbar navbar-expand-lg navbar-dark bg-pri cnt-shw mr-auto sticky pt-sm-16 pb-sm-16">
    <div class="container">
        <h3 class="font-16 text-white">
            <img src="{{asset('assets/img/logo-blanco.png')}}" width="140" alt="">
        </h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-link">
                    <a class="dropdown-item pl-0" href="{{route('app.user.create')}}"><i class="fas fa-chevron-right mr-8 text-sec"></i> Nuevo usuario</a>
                    <a class="dropdown-item pl-0" href="{{route('app.user.index')}}"><i class="fas fa-chevron-right mr-8 text-sec"></i> Buscar usuarios</a>
                    <a class="dropdown-item pl-0" href="{{route('app.requeriment.create')}}"><i class="fas fa-chevron-right mr-8 text-sec"></i> Nuevo requerimiento</a>
                    <a class="dropdown-item pl-0" href="{{route('app.requeriment.index')}}"><i class="fas fa-chevron-right mr-8 text-sec"></i> Buscar Requerimientos</a>
                    <a class="dropdown-item pl-0" href="{{route('app.anulation.create')}}"><i class="fas fa-chevron-right mr-8 text-sec"></i> Nueva anulación</a>
                    <a class="dropdown-item pl-0" href="{{route('app.anulation.index')}}"><i class="fas fa-chevron-right mr-8 text-sec"></i> Buscar anulaciones</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item pl-0" href="{{ route('logout') }}">Cerra Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .menu-principal {
        border-bottom: 5px solid;
        border-image: linear-gradient(to right, #0066F5 20%, #009104 20%, #009104 40%,#AACE15 40%, #AACE15 60%, #FCAE00 60%,#FCAE00 80%,#FCAE00 80%, #FFDA03 80%, #FFDA03 100%) 5;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-absolute navbar-light p-0 mb-24 menu-principal d-none d-lg-block" id="t-nav" style="top: 0px; transition: all 0.5s linear 0s; background-color: #003C71;">
    <div class="container-fluid pb-0 pt-20 pb-20 br-8">
        <h3 class="font-16 text-white ml-24">
            <img src="{{asset('assets/img/logo-blanco.png')}}" width="140">
        </h3>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li><p class="text-white pr-16 font-20">Rassmir Flores</p></li>
                <li class="dropdown nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link p-0 pl-12 pt-4 pb-4 font-16 br-4 pl-16 pr-16  text-white" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                        <li class="nav-link">
                            <!--<a class="dropdown-item" href="#">-</a>-->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}">Cerra Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<body class="bg-light">
<div class="container-fluid" id="main">
    <div class="row">
        <div class="col-lg-3 col-xl-2">
            <div class="p-48 p-sm-16 bg-white font-16 d-none d-lg-block">
                <h3>Usuarios</h3>
                <ul class="pl-8">
                    <li><a href="{{route('app.user.create')}}"><i class="fas fa-chevron-right mr-16"></i> Nuevo usuario</a></li>
                    <li><a href="{{route('app.user.index')}}"><i class="fas fa-chevron-right mr-16"></i> Buscar usuarios</a></li>
                </ul>
                <h3>Requerimientos</h3>
                <ul class="pl-8">
                    <li><a href="{{route('app.requeriment.create')}}"><i class="fas fa-chevron-right mr-16"></i> Nuevo requerimiento</a></li>
                    <li><a href="{{route('app.requeriment.index')}}"><i class="fas fa-chevron-right mr-16"></i> Buscar Requerimiento</a></li>
                </ul>
                <h3>Anulaciones</h3>
                <ul class="pl-8">
                    <li><a href="{{route('app.anulation.create')}}"><i class="fas fa-chevron-right mr-16"></i> Nueva anulación</a></li>
                    <li><a href="{{route('app.anulation.index')}}"><i class="fas fa-chevron-right mr-16"></i> Buscar anulación</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-xl-10">
            @yield('app-content')
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('assets/js/funciones.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
@stack('scripts')
@include('partials.flash-message')
</body>
</html>
