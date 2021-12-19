@extends('layouts.app')
@section('title','Editar Detalle Anulación')
@section('app-content')
<div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">Registro A-123456</h2>
            <hr>
        </div>
        <div class="row mt-48 mb-36">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Fecha anulación:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" value="30/12/2021" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Hora:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" value="30/12/2021" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Paciente</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="LUCERO SANCHEZ VALENTINA VERONICA" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Médico:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="DIAZ PAREDES PAULA" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Teléfono 1:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Teléfono 2:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Respuesta:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="IREAL15" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Fecha de carga:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" value="30/12/2021" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Fecha de cierre:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" value="30/12/2021" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Ejecutivo:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Intentos:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="number" value="0" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                <hr>
                <button class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;"> Editar Registro</button>
            </div>
        </div>
    </div>
@endsection
