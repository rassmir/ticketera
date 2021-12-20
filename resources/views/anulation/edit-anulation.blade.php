@extends('layouts.app')
@section('title','Editar Anulación')
@section('app-content')
<div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">ANULACION {{$anulation->number_ticket}}</h2>
        </div>
        <div class="row mt-48 mb-36">
            <form method="POST" action="{{route('app.anulation.update',['id'=>$anulation->id])}}">
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
                                        <option selected disabled value="0">Seleccione clínica</option>

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
                                            onchange="selectCenterMedic()">
                                        <option value="0" selected disabled>Seleccione Sucursal</option>
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
                                            onchange="selectUnits()">
                                        <option value="0" selected disabled>Seleccione Centro Médico</option>
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
                                        <option value="0" selected disabled>Seleccione Unidad</option>
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
                                            onchange="selectEspecialities()">
                                        <option value="0" selected disabled>Seleccione Profesional</option>
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
                                            name="especiality_id">
                                        <option value="0" selected disabled>Seleccione Especialidad</option>
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
                                    <select class="form-control" name="anulation">
                                        <option value="motivo1"
                                                @if($anulation->anulation==="motivo1") selected='selected' @endif>
                                            Motivo1
                                        </option>
                                        <option value="motivo2"
                                                @if($anulation->anulation==="motivo2") selected='selected' @endif>Motivo2
                                        </option>
                                        <option value="motivo3"
                                                @if($anulation->anulation==="motivo3") selected='selected' @endif>
                                            Motivo3
                                        </option>
                                        <option value="motivo4"
                                                @if($anulation->anulation==="motivo4") selected='selected' @endif>Motivo4
                                        </option>
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
                                              rows="5">{{$anulation->message}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Estado</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control" name="state">
                                        <option selected disabled>Seleccione un estado</option>
                                        <option value="motivo1"
                                                @if($anulation->state==="estado1") selected='selected' @endif>
                                            Estado1
                                        </option>
                                        <option value="motivo2"
                                                @if($anulation->state==="estado2") selected='selected' @endif>Estado2
                                        </option>
                                        <option value="motivo3"
                                                @if($anulation->state==="estado3") selected='selected' @endif>
                                            Estado3
                                        </option>
                                        <option value="motivo4"
                                                @if($anulation->state==="estado4") selected='selected' @endif>Estado4
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                                    <hr>
                                    <button type="submit"
                                            class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                                            style="min-width:190px;"> Editar Anulación
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
