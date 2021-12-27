@extends('layouts.app')
@section('title','Crear Anulación')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">REGISTRO DE ANULACIÓN</h2>
        </div>
        <div class="row mt-48 mb-36">
            <form id="frm-nueva-anulacion" method="POST" action="{{route('app.anulation.store')}}">
                <div class="col-lg-12">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Número Ticket</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" value="{{"A-".date('dmy'.date('gis'))}}" readonly name="number_ticket">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Clinica (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="clinics" class="form-control ob selectpicker" data-live-search="true"
                                            data-type="select" data-msj="Seleccione una Clínica" name="clinic_id"
                                            onchange="selectBranches()">
                                        <option selected disabled value="0">Seleccione clínica</option>
                                        @foreach($clinics as $clinic)
                                            <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Sucursal (*)</p>
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
                                    <p class="mb-0">Centro Médico (*)</p>
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
                                    <p class="mb-0">Unidades (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="units" class="form-control ob" data-live-search="true"
                                            data-type="select" data-msj="Seleccione una Unidad" name="unit_id"
                                            onchange="selectProfessionals()">
                                        <option value="0" selected disabled>Seleccione Unidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Profesionales (*)</p>
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
                                    <p class="mb-0">Especialidad (*)</p>
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
                                    <p class="mb-0">Motivo Anulación (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control ob" data-type="select" data-msj="Seleccione un Motivo" name="anulation">
                                        <option value="0" selected disabled>Seleccione un motivo</option>
                                        <option value="reagendamiento">Reagendamiento</option>
                                        <option value="peticion_paciente">Petición del paciente</option>
                                        <option value="motivos_medico">Motivos de médico</option>
                                        <option value="vacaciones">Vacaciones</option>
                                        <option value="personal">Personal</option>
                                        <option value="curso">Curso/congreso</option>
                                        <option value="enfermedad">Enfermedad</option>
                                        <option value="duelo">Duelo</option>
                                        <option value="reunion">Reunion</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Mensaje secretaria (*)</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea name="message" class="form-control ob" data-type="text" data-msj="Ingrese un mensaje" placeholder="Ingrese una observación"
                                              rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Estado</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" value="Ingresado" name="state" readonly>
                                    <!--<select class="form-control" name="state" readonly>
                                        <option selected>Seleccione un estado</option>
                                        <option value="Ingresado" selected>Ingresado</option>
                                    </select>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                                    <hr>
                                    <button id="btn-registrar-anulacion" type="submit"
                                            class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                                            style="min-width:190px;"> Registrar Anulación
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
<script>
$('#btn-registrar-anulacion').on('click', function(e){
        e.preventDefault();
        $(this).prop('disabled', true);
        $(this).html("Registrando...");
        var validacion_datos = ValidadorAuto('.ob');

        if(validacion_datos == "true"){
            $('#frm-nueva-anulacion').submit();
        }else{
            $(this).prop('disabled', false);
            $(this).html("Registrar");
            return false;
        }

});
</script>
@endpush
