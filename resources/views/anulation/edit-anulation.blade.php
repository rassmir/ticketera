@extends('layouts.app')
@section('title','Editar Anulación')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
    <div class='loader'><div class='content'><img src='{{asset('assets/img/loader.gif')}}'><p>Cargando datos de la anulación...</p></div></div>
        <div class="text-left">
            <h2 class="text-pri">ANULACION {{$anulation->number_ticket}}</h2>
        </div>
        <div class="row mt-48 mb-36">
            <form id="form_editar_anulacion" method="POST" action="{{route('app.anulation.update',['id'=>$anulation->id])}}">
                <div class="col-lg-12">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Número Ticket</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" id="nro_ticket" class="form-control" value="{{$anulation->number_ticket}}"
                                           readonly name="number_ticket">
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
                                            onchange="selectBranches()" readonly>
                                            @foreach($clinics as $clinic)
                                                <option value="{{$clinic->id}}"
                                                    @if($clinic->id==$anulation->clinic_id) selected='selected' @endif>{{$clinic->name}}</option>
                                                @endforeach
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
                                            onchange="selectProfessionals()" readonly>

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
                                        <option value="reagendamiento"
                                                @if($anulation->anulation==="reagendamiento") selected='selected' @endif>
                                            Reagendamiento
                                        </option>
                                        <option value="peticion_paciente"
                                                @if($anulation->anulation==="peticion_paciente") selected='selected' @endif>
                                                Petición del paciente
                                        </option>
                                        <option value="motivos_medico"
                                                @if($anulation->anulation==="motivos_medico") selected='selected' @endif>
                                                Motivos de médico
                                        </option>
                                        <option value="vacaciones"
                                                @if($anulation->anulation==="vacaciones") selected='selected' @endif>
                                                Vacaciones
                                        </option>
                                        <option value="personal"
                                                @if($anulation->anulation==="personal") selected='selected' @endif>
                                                Personal
                                        </option>
                                        <option value="curso"
                                                @if($anulation->anulation==="curso") selected='selected' @endif>
                                                Curso/congreso
                                        </option>
                                        <option value="enfermedad"
                                                @if($anulation->anulation==="enfermedad") selected='selected' @endif>
                                                Enfermedad
                                        </option>
                                        <option value="duelo"
                                                @if($anulation->anulation==="duelo") selected='selected' @endif>
                                                Duelo
                                        </option>
                                        <option value="reunion"
                                                @if($anulation->anulation==="reunion") selected='selected' @endif>
                                                Reunión
                                        </option>
                                        <option value="otro"
                                                @if($anulation->anulation==="otro") selected='selected' @endif>
                                                Otro
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
                                    <textarea name="message" class="form-control  ob" data-type="text" data-msj="Ingrese un mensaje" placeholder="Ingrese una observación"
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
                                    <select id="estado_anulacion" class="form-control" name="state">
                                        <option selected disabled>Seleccione un estado</option>
                                        <option value="Ingresado" disabled
                                                @if($anulation->state==="Ingresado") selected='selected' @endif>
                                            Ingresado
                                        </option>
                                        <option value="Proceso"
                                                @if($anulation->state==="Proceso") selected='selected' @endif>En Proceso
                                        </option>
                                        <option value="Solucionado"
                                                @if($anulation->state==="Solucionado") selected='selected' @endif>
                                            Solucionado
                                        </option>
                                        <option value="Cerrado"
                                                @if($anulation->state==="Cerrado") selected='selected' @endif>Cerrado
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                                    <hr>
                                    <a href="{{url('buscar-anulaciones')}}" class="btn btn-primary font-14 br-4 pl-20 pr-20"><i class="fas fa-arrow-left"></i> Regresar</a>
                                    <button id="edit-anulacion" type="submit"
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
$(document).ready(function(){
    RecuperarDatos("sucursales", '{{$anulation->clinicid}}', "#branches", '{{$anulation->branid}}');
    RecuperarDatos("centros-medicos", '{{$anulation->branid}}', "#center_medics", '{{$anulation->centerid}}');
    RecuperarDatos("unidades", '{{$anulation->centerid}}', "#units", '{{$anulation->unitid}}');
    RecuperarDatos("profesionales", '{{$anulation->unitid}}', "#professionals", '{{$anulation->profid}}');
    RecuperarDatos("especialidades", '{{$anulation->profid}}', "#especialities", '{{$anulation->espid}}');
    setTimeout(function(){
        $('.loader').fadeOut();
    }, 2000);
});

const RecuperarDatos = (urlBase, valor, idSelect, valorActual) => {
    $.ajax({
        type: "GET",
        url: uri + urlBase + "/" +  valor,
        success: function (response) {
            $.each(response, function(i, item){
                $(idSelect).append("<option value="+ item['id'] +">" + item['name'] + "</option>");
            });
            setTimeout(function(){
                $("option[value='"+valorActual+"']", idSelect).attr("selected", true);
            }, 300);


        },
        error: function (error) {
            console.log(error);
        }
    });
}


        $('#edit-anulacion').on('click', function(e){
            e.preventDefault();

            $(this).prop('disabled', true);
            $(this).html("Registrando...");

            let estado = $('#estado_anulacion option:selected').val();
            let idticket = $('#nro_ticket').val();
            var validacion_datos = ValidadorAuto('.ob');

            if(validacion_datos == "true"){

                if(estado == "Cerrado"){
                $.ajax({
                type: "GET",
                url: uri + "consultar-ticket/" + idticket,
                success: function (response) {

                    registros_nc = response.length;
                    console.log(registros_nc);

                    Swal.fire({
                        title: 'Esta seguro que desea cerrar esta anulación?',
                        text: 'Actualmente hay ' + registros_nc + ' Registro no contactados, desea enviarles una notificación?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'No, cerrar anulación',
                        denyButtonText: `Notificar pacientes`,
                        cancelButtonText: `Cancelar`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $('#form_editar_anulacion').submit();
                        } else if (result.isDenied) {
                             $(this).html("Notificando pacientes...");
                            
                            $.ajax({
                                type: "GET",
                                url: uri + "enviar-correos/" + idticket,
                                success: function (response) {
                                    console.log(response);
                                    $('#form_editar_anulacion').submit();
                                },
                                error: function (error) {
                                    console.log(error);
                                }
                            });
                        }
                    })
                   console.log(response)
                },
                error: function (error) {
                    console.log(error);
                }
            });
            }else{
                $('#form_editar_anulacion').submit();
            }


            }else{
                $(this).prop('disabled', false);
                $(this).html("Registrar");
                return false;
            }

            //consultingAnulation('A-20122133810');
        });

        /*const consultingAnulation = (idticket) => {
            $.ajax({
                type: "GET",
                url: uri + "consultar-ticket/" + idticket,
                success: function (response) {
                   console.log(response)
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }*/
    </script>
@endpush
