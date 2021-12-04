@extends('layouts.app')
@section('title','Buscar Requerimiento')
@section('app-content')
<div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
    <div class="text-left">
        <h2 class="text-pri">LISTADO DE REQUERIMIENTOS</h2>
        <p class="font-20 font-pri">Muestra las acciones realiza por los usuarios</p>
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
                            <p class="mb-0">Nº Requerimiento</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="#">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left">
                            <p class="mb-0">Desde</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="date" class="form-control" placeholder="Desde">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left">
                            <p class="mb-0">Hasta</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="date" class="form-control" placeholder="Hasta">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1 text-center mt-8">
            <button class="btn bg-sec border-sec text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;"> <i class="fas fa-search"></i> Buscar</button>
        </div>
        <!-- TABLA -->
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered b-table mt-24">
                    <tr class="bg-pri text-white">

                        <th># Requerimiento</th>
                        <th>RUT Paciente</th>
                        <th>Fecha ingreso</th>
                        <th>Estado</th>
                        <th>Centro médico</th>
                        <th>Médico</th>
                        <th>Acciones</th>
                    </tr>
                    <tbody>
                    <tr>
                        @foreach($requeriments as $req)
                        <td>{{$req->id}}</td>
                        <td>{{$req->rut}}</td>
                        <td>{{$req->datetime_local}}</td>
                        <td>{{$req->state}}</td>
                        <td>{{$req->centername}}</td>
                        <td>{{$req->profname}}</td>
                        <td>
                            <ul class="d-lg-flex">
                                <li><a href="#" class="btn bg-tri mr-12 text-black"><i class="far fa-eye"></i></a></li>
                                <li><a href="#" class="btn bg-tri mr-12 text-black"><i class="far fa-edit"></i></a></li>
                            </ul>
                        </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
