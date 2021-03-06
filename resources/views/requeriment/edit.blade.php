@extends('layouts.app')
@section('title','Editar Requerimiento')
@section('app-content')

    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
    <div class='loader'><div class='content'><img src='{{asset('assets/img/loader.gif')}}'><p>Cargando datos del Requerimiento...</p></div></div>
        <div class="text-left">
            <h2 class="text-pri">EDITAR REQUERIMIENTO</h2>
        </div>
        <form id="frm-nuevo-requerimiento" method="POST"
              action="{{route('app.requeriment.update',['id'=>$requeriment->id])}}">
            @csrf
            <input id="status_close" name="status_close" type="hidden" value="{{$requeriment->status_close}}">
            <div class="row mb-36">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 mt-20">
                            <h3 class="font-20">Datos del requerimiento</h3>
                            <hr>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Tipo de requerimiento</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control" name="type">
                                        <option disabled selected>Seleccione Tipo De Requerimiento</option>
                                        <option value="Hora Extra"
                                                @if($requeriment->type==="Hora Extra") selected='selected' @endif>Hora
                                            Extra
                                        </option>
                                        <option value="Recado Medico"
                                                @if($requeriment->type==="Recado Medico") selected='selected' @endif>
                                            Recado M??dico
                                        </option>
                                        <option value="Certificado Medico"
                                                @if($requeriment->type==="Certificado Medico") selected='selected' @endif>
                                            Certificado M??dico
                                        </option>
                                        <option value="Orden de Examen"
                                                @if($requeriment->type==="Orden de Examen") selected='selected' @endif>
                                            Orden De Ex??men
                                        </option>
                                        <option value="Seguro complementario"
                                                @if($requeriment->type==="Seguro complementario") selected='selected' @endif>
                                            Seguro Complementario
                                        </option>
                                        <option value="Receta Medica"
                                                @if($requeriment->type==="Receta Medica") selected='selected' @endif>
                                            Receta M??dica
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mt-8"></div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">N??mero de solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="R-15242021" readonly
                                           value="{{$requeriment->number_solicity}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">D??a y Hora</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="date-time" readonly type="datetime" class="form-control"
                                           placeholder="Fecha" name="datetime_local"
                                           value="{{$requeriment->datetime_local}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Estado</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control" name="state" id="state" onchange="onChangeState()">
                                        <option value="Ingresado" disabled
                                                @if($requeriment->state==="Ingresado") selected='selected' @endif>
                                            Ingresado
                                        </option>
                                        <option value="Proceso"
                                                @if($requeriment->state==="Proceso") selected='selected' @endif>
                                            En Proceso
                                        </option>
                                        <option value="Solucionado"
                                                @if($requeriment->state==="Solucionado") selected='selected' @endif>
                                            Solucionado
                                        </option>
                                        <option value="Cerrado"
                                                @if($requeriment->state==="Cerrado") selected='selected' @endif>Cerrado
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-20">
                            <h3 class="font-20">Datos del paciente</h3>
                            <hr>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">RUT*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$requeriment->rut}}" maxlength="12"
                                           oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                           class="RUT form-control ob" data-type="text" data-msj="Ingrese un RUT"
                                           placeholder="RUT" name="rut">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Primer nombre (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$requeriment->name}}" class="form-control ob"
                                           data-type="text" data-msj="Ingrese un nombre" placeholder="Primer nombre"
                                           name="name">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Apellido Paterno (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$requeriment->father_name}}" class="form-control ob"
                                           data-type="text" data-msj="Ingrese el apellido paterno"
                                           placeholder="Apellido Paterno"
                                           name="father_name">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Apellido Materno (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$requeriment->mother_name}}" class="form-control ob"
                                           data-type="text" data-msj="Ingrese el apellido materno"
                                           placeholder="Apellido Materno"
                                           name="mother_name">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono celular 1</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$requeriment->phone1}}" class="form-control"
                                           placeholder="Fono celular" name="phone1">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono celular 2</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$requeriment->phone2}}" class="form-control"
                                           placeholder="Fono celular 2" name="phone2">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono fijo 1 (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$requeriment->fije1}}" class="form-control ob"
                                           data-type="number" data-msj="Ingrese n??mero fijo" placeholder="Fono fijo 1"
                                           name="fije1">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-20">
                            <hr>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Clinica</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="clinics" class="form-control ob selectpicker" data-live-search="true"
                                            data-type="select" data-msj="Seleccione una Cl??nica" name="clinic_id"
                                            onchange="selectBranches()">
                                                @foreach($clinics as $clinic)
                                                <option value="{{$clinic->id}}"
                                                    @if($clinic->id==$requeriment->clinic_id) selected='selected' @endif>{{$clinic->name}}</option>
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
                                    <p class="mb-0">Centro M??dico</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="center_medics" class="form-control ob" data-live-search="true"
                                            data-type="select" data-msj="Seleccione un Centro M??dico"
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
                                            onchange="selectProfessionals()">
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
                                    <p class="mb-0">Especialidad (*)</p>
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
                                    <p class="mb-0">Fecha Creaci??n</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="date" type="date" class="form-control" readonly name="date"
                                           value="{{$requeriment->date}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha Probable H.E</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" name="date_he"
                                           value="{{$requeriment->date_he}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha Probable respuesta</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="fecha_sla" type="date" class="form-control" name="date_response"
                                           value="{{$requeriment->date_response}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Email*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="email" value="{{$requeriment->email}}" class="form-control ob"
                                           data-type="text" data-msj="Ingrese un correo" placeholder="Ingrese un Email"
                                           name="email">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-20">
                            <hr>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripcion de solicitud 1</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observaci??n 1" rows="5"
                                              name="description1">{{$requeriment->description1}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripcion de solicitud 2</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observaci??n 2" rows="5"
                                              name="description2">{{$requeriment->description2}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripcion de solicitud 3</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observaci??n 3" rows="5"
                                              name="description3">{{$requeriment->description3}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-16">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Respuesta del centro m??dico</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Respuesta del centro m??dico" rows="5"
                                              name="response_medic">{{$requeriment->response_medic}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-16">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha y hora del ticket solucionado</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="date_solution" type="datetime" class="form-control" readonly name="date_solution"
                                           value="{{$requeriment->date_solution}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Usuario que crea la solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" readonly
                                           name="user_create" value="{{$requeriment->user_create}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha de cierre de la solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="date_close" type="datetime" class="form-control" readonly name="date_close"
                                           value="{{$requeriment->date_close}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Usuario que cierra la solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="Pedro Martinez" readonly
                                           name="user_close" value="{{Auth::user()->name_complete}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                                    <hr>
                                    <a href="{{url('buscar-requerimientos')}}" class="btn btn-primary font-14 br-4 pl-20 pr-20"><i class="fas fa-arrow-left"></i> Regresar</a>
                                    <button id="btn-registrar-requerimiento" type="submit"
                                            class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                                            style="min-width:190px;"> Guardar cambios
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
@push('scripts')
<script type="text/javascript">

$(document).ready(function(){
    RecuperarDatos("sucursales", '{{$requeriment->clinicid}}', "#branches", '{{$requeriment->branid}}');
    RecuperarDatos("centros-medicos", '{{$requeriment->branid}}', "#center_medics", '{{$requeriment->centerid}}');
    RecuperarDatos("unidades", '{{$requeriment->centerid}}', "#units", '{{$requeriment->unitid}}');
    RecuperarDatos("profesionales", '{{$requeriment->unitid}}', "#professionals", '{{$requeriment->profid}}');
    RecuperarDatos("especialidades", '{{$requeriment->profid}}', "#especialities", '{{$requeriment->espid}}');
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


        // let uri = 'http://localhost:8000/';
        const onChangeState = () => {
            let now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            let state = $("#state").val();
            if (state === 'Solucionado') {
                $("#date_solution").val(now.toISOString().slice(0, 16));
                $("#date_close").val('');
            }else if(state === 'Cerrado'){
                $("#date_close").val(now.toISOString().slice(0, 16));
            }else{
                $("#date_solution").val('');
            }
        }
        // $(document).ready(function () {
        // let clinic_id = $("#clinics").val();
        // let branch_id = $("#branches").val();
        // console.log(branch_id);
        // editselectBranches(clinic_id)
        // });

        const editselectBranches = (clinic_id) => {
            $.ajax({
                type: "GET",
                url: uri + "sucursales/" + clinic_id,
                success: function (response) {
                    let branches = $('#branches');
                    branches.empty();
                    branches.append('<option selected disabled>Seleccione Sucursal</option>');
                    for (let i = 0; i < response.length; i++) {
                        branches.append('<option value="' + response[i].id + '" ' + response[i].name + '>' + response[i].name + '</option>');
                    }
                    branches.selectpicker();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        const editselectCenterMedic = () => {
            let branch_id = $("#branches").val();
            $.ajax({
                type: "GET",
                url: uri + "centros-medicos/" + branch_id,
                success: function (response) {
                    let centers = $('#center_medics');
                    centers.empty();
                    centers.append('<option selected disabled>Seleccione Centro M??dico</option>');
                    for (let i = 0; i < response.length; i++) {
                        centers.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                    }
                    centers.selectpicker();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        // const selectUnits = () => {
        //     let center_medical_id = $("#center_medics").val();
        //     $.ajax({
        //         type: "GET",
        //         url: uri + "unidades/" + center_medical_id,
        //         success: function (response) {
        //             let units = $('#units');
        //             units.empty();
        //             units.append('<option selected disabled>Seleccione Unidad</option>');
        //             for (let i = 0; i < response.length; i++) {
        //                 units.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
        //             }
        //             units.selectpicker();
        //         },
        //         error: function (error) {
        //             console.log(error);
        //         }
        //     });
        // }
        //
        // const selectProfessionals = () => {
        //     let units = $("#units").val();
        //     $.ajax({
        //         type: "GET",
        //         url: uri + "profesionales/" + units,
        //         success: function (response) {
        //             let professionals = $('#professionals');
        //             professionals.empty();
        //             professionals.append('<option selected disabled>Seleccione Profesional</option>');
        //             for (let i = 0; i < response.length; i++) {
        //                 professionals.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
        //             }
        //             professionals.selectpicker();
        //         },
        //         error: function (error) {
        //             console.log(error);
        //         }
        //     });
        // }
        //
        // const selectEspecialities = () => {
        //     let professionals = $("#professionals").val();
        //     $.ajax({
        //         type: "GET",
        //         url: uri + "especialidades/" + professionals,
        //         success: function (response) {
        //             let especialities = $('#especialities');
        //             especialities.empty();
        //             especialities.append('<option selected disabled>Seleccione Especialidad</option>');
        //             for (let i = 0; i < response.length; i++) {
        //                 especialities.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
        //             }
        //             especialities.selectpicker();
        //         },
        //         error: function (error) {
        //             console.log(error);
        //         }
        //     });
        // }

        // GUARDAR REQUERIMIENTO
        var fecha_sla = $('#fecha_sla').val();
        var fechaActual = new Date();



        $('#btn-registrar-requerimiento').on('click', function (e) {
            e.preventDefault();
            var estado_req = $('#state option:selected').val();

            var validacion_datos = ValidadorAuto('.ob');

            if (validacion_datos == "true") {

                if(estado_req == "Cerrado"){
                if(new Date().getTime() > new Date(fecha_sla).getTime()){
                    console.log("Fecha caducada");
                    $('#status_close').val("caducado");
                }else{
                    $('#status_close').val("exitoso");
                }
                $('#frm-nuevo-requerimiento').submit();
            }else{
                $('#frm-nuevo-requerimiento').submit();
            }
            } else {
                return false;
            }

        });


        /*$('.RUT').on('keyup', function () {
            let valor = $(this).val();
            let longitud = $(this).val().length;
            console.log(longitud);

            if (longitud == 2) {
                $(this).val(valor + ".");
            } else if (longitud == 6) {
                $(this).val(valor + ".");
            } else if (longitud == 10) {
                $(this).val(valor + "-");
            } else {
                $(this).val(valor);
            }
        }); */
    </script>
@endpush
