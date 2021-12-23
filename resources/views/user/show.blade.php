@extends('layouts.app')
@section('title','Ver Usuario')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">DETALLE DE USUARIO : {{$user->name_complete}} <a href="{{ url('/editar-usuario/'.$user->id) }}" class="btn-light ml-16 font-16 p-8 br-4 pl-20 pr-20"><i class="far fa-edit"></i> Editar usuario</a></h2>
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

                                    <select class="form-control ob tipo_usuario" data-type="select" data-msj="Seleccione un Rol" name="role_id" disabled>
                                        @foreach($roles as $rol)
                                            <option disabled
                                                value="{{$rol->id}}" {{ $user->hasRole($rol->name) ? 'selected' : '' }}>{{ $rol->display_name }}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-control mt-16 listado-clinicas" style="display:none;"
                                            name="clinic_id" disabled>
                                        <option disabled selected>Seleccione clinica</option>
                                        @foreach($clinics as $clinic)
                                            <option disabled value="{{$clinic->id}}"
                                            @foreach($user->clinic as $usr)
                                                {{ $usr->pivot->clinic_id == $clinic->id ? 'selected' : '' }}
                                            @endforeach
                                            >
                                                {{$clinic->name}}
                                            </option>
                                        @endforeach
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
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold mt-24">
                                <a href="{{url('buscar-usuarios')}}" class="btn btn-primary font-14 br-4 pl-20 pr-20">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

