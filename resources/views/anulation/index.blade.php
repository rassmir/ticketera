@extends('layouts.app')
@section('title','Buscar Anulación')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">LISTADO DE ANULACIONES</h2>
        </div>
        <div class="row mt-48 mb-36">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Clínica</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Clinica 1</option>
                                    <option>Clinica 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Centro médico</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Seleccione un centro médico</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 text-center mt-8">
                <button class="btn bg-sec border-sec text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;"> <i class="far fa-search"></i> Buscar</button>
            </div>

            <!-- TABLA -->

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered b-table mt-24">
                        <tr class="bg-pri text-white">

                            <th>#</th>
                            <th>Centro médico</th>
                            <th>Nombre Doctor</th>
                            <th>Especialidad</th>
                            <th>Obs secretaria</th>
                            <th>Usuario creación Req</th>
                            <th>Motivo anulación</th>
                            <th>Estado solicitud</th>
                            <th>Acciones</th>
                        </tr>
                        <tbody>
                        <tr>
                            <td>47854645</td>
                            <td>La Dehesa</td>
                            <td>Carmen Paz</td>
                            <td>Psicopedagoga</td>
                            <td>Por favor reagendar segùn disponibilidad</td>
                            <td>Camila Romero</td>
                            <td>Otros</td>
                            <td>Ingresado</td>
                            <td>
                                <ul class="d-lg-flex">
                                    <li><i class="far fa-eye mr-12"></i></li>
                                    <li><i class="far fa-edit mr-12"></i></li>
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
