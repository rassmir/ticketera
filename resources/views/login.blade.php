@extends('layouts.auth')
@section('title','Login')
@section('auth-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 d-flex align-items-center justify-content-center" id="panel-izquierdo">
            <img src="{{asset('assets/img/logo-blanco.png')}}" width="300" alt="">
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="container p-36 pt-64 pb-64 main-content mt-48 bg-white" style="max-width:550px">
                <h1 class="font-36 text-light font-weight-300">Bienvenido(a)</h1>
                <h2 class="font-16 text-pri">Por favor, inicie sesión para continuar</h2>
                <input type="text" class="form-control mt-20" placeholder="Usuario">
                <input type="password" class="form-control mt-16" placeholder="Contraseña">
                <div class="text-right">
                    <a href="{{route('forget')}}" class="mt-16 d-block font-weight-bold">¿Olvidaste tu contraseña?</a>
                </div>
                <a href="{{route('app.user.index')}}" class="btn btn-primary bg-pri font-weight-bold mt-20 w-100">Iniciar Sesión <i class="fas fa-arrow-right ml-20"></i></a>
                <p class="mt-36 text-light font-16">BANMEDICA 2021 - Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</div>
@endsection


