@extends('layouts.app')
@section('title','Editar Detalle Anulación')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">Registro {{$detailanulation->number_ticket}}</h2>
            <hr>
        </div>
        <form method="POST" action="{{route('app.anulation.update.detailanulation',['id'=>$detailanulation->id])}}">
            @csrf
            <div class="row mt-48 mb-36">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Fecha anulación:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->date_anulation}}" class="form-control" name="date_anulation">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Hora:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->hour}}" class="form-control" name="hour">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Paciente</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->patient}}" class="form-control" name="patient">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Médico:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->name_doctor}}" class="form-control" name="name_doctor">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Teléfono 1:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->phone1}}" class="form-control" name="phone1">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Teléfono 2:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->phone2}}" class="form-control"  name="phone2">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Respuesta:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->response_anulation}}"
                                           class="form-control" name="response_anulation">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Fecha de carga:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->date_load}}" class="form-control" name="date_load">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Fecha de cierre:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->date_close}}" class="form-control" name="date_close">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Ejecutivo:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->executive}}" class="form-control" name="executive">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Intentos:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="number" value="{{$detailanulation->trys}}" class="form-control" name="trys">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Correo:</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$detailanulation->email}}" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                                    <hr>
                                    <button id="edit-anulacion" type="submit"
                                            class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                                            style="min-width:190px;"> Editar Detalle Anulación
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
