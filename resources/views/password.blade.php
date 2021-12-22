@extends('layouts.auth')
@section('title','Login')
@section('auth-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center justify-content-center" id="panel-izquierdo">
                <img src="{{asset('assets/img/logo-blanco.png')}}" width="300" alt="">
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <form action="{{route('validate-reset-password')}}" method="POST">
                    @csrf
                    <div class="container p-36 pt-64 pb-64 main-content mt-48 bg-white" style="max-width:550px">
                        <h2 class="text-pri">Enviar Correo para Resetear</h2>
                        <p>El usuario abrirá el link del correo para poder cambiar su contraseña</p>
                        <p class="mb-4 mt-20 font-weight-bold">Email</p>
                        <input type="text" class="form-control mt-4" placeholder="Escriba su Correo" name="email">
                        <button type="submit" class="btn bg-sec text-pri font-weight-bold mt-20 w-100">Enviar Correo</button>
                        <a href="{{route('login')}}"
                           class="btn bg-pri text-white font-weight-bold mt-20 w-100">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


