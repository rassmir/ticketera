@extends('layouts.app')
@section('title','Editar Anulación')
@section('app-content')
<div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">ANULACION {{$anulation->number_ticket}} <a href="{{ url('/editar-anulacion/'.$anulation->id) }}" class="btn-light ml-16 font-16 p-8 br-4 pl-20 pr-20"><i class="far fa-edit"></i> Editar anulación</a></h2>
        </div>
        <div class="row mt-48 mb-36">
                <div class="col-lg-12">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Número Ticket</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" value="{{$anulation->number_ticket}}" readonly name="number_ticket">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Clinica</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="clinics" class="form-control ob selectpicker" data-live-search="true"
                                            data-type="select" data-msj="Seleccione una Clínica" name="clinic_id"
                                            onchange="selectBranches()" disabled>
                                        <option selected disabled value="0">{{$anulation->clinicname}}</option>
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
                                    <select id="branches" class="form-control ob" data-live-search="true"
                                            data-type="select" data-msj="Seleccione una Sucursal" name="branch_id"
                                            onchange="selectCenterMedic()" disabled>
                                        <option value="0" selected disabled>{{$anulation->braname}}</option>
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
                                    <select id="center_medics" class="form-control ob" data-live-search="true"
                                            data-type="select" data-msj="Seleccione un Centro Médico"
                                            name="center_medical_id"
                                            onchange="selectUnits()" disabled>
                                        <option value="0" selected>{{$anulation->centername}}</option>
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
                                    <select id="units" class="form-control ob" data-live-search="true"
                                            data-type="select" data-msj="Seleccione una Unidad" name="unit_id"
                                            onchange="selectProfessionals()" disabled>
                                        <option value="0" selected>{{$anulation->unitname}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Profesionales</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="professionals" class="form-control ob" data-live-search="true"
                                            data-type="select" data-msj="Seleccione un profesional"
                                            name="professional_id"
                                            onchange="selectEspecialities()" disabled>
                                        <option value="0" selected >{{$anulation->profname}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Especialidad*</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="especialities" class="form-control ob" data-live-search="true"
                                            data-type="select" data-msj="Seleccione una Especialidad"
                                            name="especiality_id" disabled>
                                        <option value="0" selected >{{$anulation->espname}}</option>
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
                                    <select class="form-control" name="anulation" disabled>
                                        <option selected>{{$anulation->anulation}}</option>
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
                                    <textarea name="message" class="form-control" placeholder="Ingrese una observación"
                                              rows="5" disabled>{{$anulation->message}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Estado</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control" name="state" disabled>
                                        <option selected>{{$anulation->message}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <hr>
                            <a href="{{url('buscar-anulaciones')}}" class="btn btn-primary font-14 br-4 pl-20 pr-20">Regresar</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
