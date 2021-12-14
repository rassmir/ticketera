@extends('layouts.app')
@section('title','Crear Anulación')
@section('app-content')
<div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
    <div class="text-left">
        <h2 class="text-pri">REGISTRO DE ANULACIÓN</h2>
    </div>
    <div class="row mt-48 mb-36">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Número Ticket</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="A-15242021" disabled>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Clinica</p>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Seleccione un centro médico</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Sucursal</p>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Seleccione un centro médico</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Centro Médico</p>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Seleccione un centro médico</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Unidades</p>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Seleccione un centro médico</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Profesional Tratante</p>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Seleccione un Profesional</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Especialidad</p>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Seleccione una especialidad</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Motivo Anulación*</p>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Seleccione un motivo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-12 text-left font-weight-bold">
                            <p class="mb-0">Mensaje secretaria*</p>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <textarea class="form-control" placeholder="Ingrese una observación" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-left font-weight-bold">
                            <p class="mb-0">Estado</p>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Seleccione un estado</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="col-lg-12 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                            <hr>
                            <button class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;"> Registrar Anulación</button>
                        </div>

                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
@endsection
