@extends('layouts.app')
@section('title','Ver Detalle Anulación')
@section('app-content')
<div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">Registro {{$detailanulation->number_ticket}}</h2>
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
                                <input type="text" value="{{$detailanulation->date_anulation}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Hora:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->hour}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Paciente</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->patient}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Médico:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->name_doctor}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Teléfono 1:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->phone1}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Teléfono 2:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->phone2}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Respuesta:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->response_anulation}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Fecha de carga:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" value="{{$detailanulation->date_load}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Fecha de cierre:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->date_close}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Ejecutivo:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->executive}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Intentos:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="number" value="{{$detailanulation->trys}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Correo:</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$detailanulation->email}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
