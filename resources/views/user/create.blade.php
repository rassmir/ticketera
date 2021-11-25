@extends('layouts.app')
@section('title','Nuevo Usuarios')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">


        <div class="text-left">
            <h2 class="text-pri">REGISTRO DE USUARIO</h2>
            <p>Ingrese los datos a continuación para registrar un nuevo usuario</p>
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
                                <select class="form-control tipo_usuario">
                                    <option value="1">Agente</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Usuario Clinica</option>
                                </select>

                                <select class="form-control mt-16 listado-clinicas" style="display:none;">
                                    <option value="1">Clinica 1</option>
                                    <option value="2">Clinica 2</option>
                                    <option value="3">Clinica 3</option>
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
                                <input type="text" class="form-control" placeholder="Nombres y Apellidos">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">RUT</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="A-15242021">
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
                                <input type="text" class="form-control" placeholder="Correo electrónico">
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-12 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Password</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="password" class="form-control" placeholder="Password">
                                <input type="password" class="form-control mt-16" placeholder="Confirmar Password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-8">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                        <hr>
                        <button class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;"> Registrar Usuario</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="text-left">
            <h2 class="text-pri">Registro de usuarios mediante Excel(.xls)</h2>
            <p>Usted puede cargar múltiples usuarios a través de un formato Excel(.xls) <a href="#">(Descargar formato de prueba)</a></p>
        </div>

        <div class="row mt-48 mb-36">
            <div class="col-lg-4 mt-8">
                <div class="row align-items-center">
                    <div class="col-lg-5 text-left font-weight-bold">
                        <p class="mb-0">Carga Excel (.xls)*</p>
                    </div>
                    <div class="col-lg-7">
                        <input type="file" class="form-control" placeholder="RUT">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-8">
                <button class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;"> Cargar Usuarios</button>
            </div>
        </div>

    </div>
@endsection
