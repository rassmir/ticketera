@extends('layouts.app')
@section('title','Ver Usuario')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">DETALLE DE USUARIO : {{$user->name_complete}}</h2>
        </div>
            <div class="row mt-48 mb-36">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Tipo de usuarios</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control ob" data-type="select" data-msj="Seleccione un Rol" name="role_id">
                                        <option selected disabled>{{$user->rolname}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Nombres y Apellidos</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese Nombres y Apellidos" placeholder="Nombres y Apellidos"
                                           name="name_complete" readonly value="{{$user->name_complete}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">RUT</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese un RUT" placeholder="A-15242021" name="rut" readonly value="{{$user->rut}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Correo</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese un correo" placeholder="Correo electrónico"
                                           name="email" readonly value="{{$user->email}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

