@extends('layouts.app')
@section('title','Listar Usuarios')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">LISTADO DE USUARIOS</h2>
        </div>
        <div class="row mt-48 mb-36">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Tipo de usuario</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option value="1">Agente</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Usuario Clinica</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">RUT</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="number" class="form-control" placeholder="RUT">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 text-center mt-8">
                <button class="btn bg-sec border-sec text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;">
                    <i class="fas fa-search"></i>
                    Buscar usuario
                </button>
            </div>

            <!-- TABLA -->

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered b-table mt-24">
                        <tr class="bg-pri text-white">

                            <th>#</th>
                            <th>Tipo de usuario</th>
                            <th>Nombres y Apellidos</th>
                            <th>RUT</th>
                            <th>Acciones</th>
                        </tr>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Supervisor</td>
                            <td>Carmen Paz</td>
                            <td>320-215-215-Y</td>
                            <td>
                                <ul class="d-lg-flex mb-0">
                                    <li><i class="far fa-eye mr-12"></i></li>
                                </ul>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
