@extends('layouts.auth')
@section('title','Nueva Contraseña')
@section('auth-content')
    <form method="POST" action="{{route('submit-reset-password')}}">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center" id="panel-izquierdo">
                    <img src="{{asset('assets/img/logo-blanco.png')}}" width="300" alt="">
                </div>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="container p-36 pt-64 pb-64 main-content mt-48 bg-white" style="max-width:550px">
                        <h2 class="text-pri">NUEVA CONTRASEÑA</h2>

                        <p class="mb-4 font-weight-bold">Correo Electrónico</p>
                        <input type="email" class="form-control mt-4" placeholder="Email" name="email">

                        <p class="mb-4 mt-20  font-weight-bold">Nueva Contraseña</p>
                        <input type="password" class="form-control mt-4" placeholder="Contraseña" name="password">

                        <p class="mb-4 mt-20 font-weight-bold">Repita su nueva contraseña</p>
                        <input type="password" class="form-control mt-4" placeholder="Repita su contraseña"
                               name="password_confirmation">

                        <button type="submit" class="btn bg-sec text-pri font-weight-bold mt-20 w-100">Actualizar
                            Contraseña
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


