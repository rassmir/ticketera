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
@yield('auth-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/funciones.js')}}"></script>
@include('partials.flash-message')


</html>
