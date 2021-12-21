@extends('layouts.app')
@section('title','Editar Anulación')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
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
                                        <option selected
                                                value="{{$anulation->clinicid}}">{{$anulation->clinicname}}</option>
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
                                        <option selected value="{{$anulation->branid}}">{{$anulation->braname}}</option>
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
                                        <option selected
                                                value="{{$anulation->centerid}}">{{$anulation->centername}}</option>
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
                                        <option selected
                                                value="{{$anulation->unitid}}">{{$anulation->unitname}}</option>
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
                                        <option selected
                                                value="{{$anulation->profid}}">{{$anulation->profname}}</option>
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
                                        <option selected value="{{$anulation->espid}}">{{$anulation->espname}}</option>
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
                                                @if($anulation->anulation==="motivo2") selected='selected' @endif>
                                            Motivo2
                                        </option>
                                        <option value="motivo3"
                                                @if($anulation->anulation==="motivo3") selected='selected' @endif>
                                            Motivo3
                                        </option>
                                        <option value="motivo4"
                                                @if($anulation->anulation==="motivo4") selected='selected' @endif>
                                            Motivo4
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
                                    <select id="estado_anulacion" class="form-control" name="state">
                                        <option selected disabled>Seleccione un estado</option>
                                        <option value="Ingresado"
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


        $('#edit-anulacion').on('click', function(e){
            e.preventDefault();
            let estado = $('#estado_anulacion option:selected').val();
            let idticket = $('#nro_ticket').val();

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
                            console.log("Notificar a pacientes del ticket " + idticket);
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
