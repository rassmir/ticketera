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
                    <h2 class="text-pri">NUEVA CONTRASEÑA</h2>
                    <p>El usuario abrirá el link del correo para poder cambiar su contraseña</p>

                    <p class="mb-4 font-weight-bold">Contraseña</p>
                    <input type="text" class="form-control mt-4" placeholder="Contraseña">

                    <p class="mb-4 mt-20 font-weight-bold">Repita su contraseña</p>
                    <input type="text" class="form-control mt-4" placeholder="Repita su contraseña">

                    <a href="#" class="btn bg-sec text-pri font-weight-bold mt-20 w-100">Enviar</a>
                    <a href="{{route('login')}}" class="btn bg-pri text-white font-weight-bold mt-20 w-100">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection


