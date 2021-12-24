@extends('layouts.app')
@section('title','Nuevo Requerimiento')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">NUEVO REQUERIMIENTO</h2>
        </div>
        <form id="frm-nuevo-requerimiento" method="POST" action="{{route('app.requeriment.store')}}">
            @csrf
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
                                    <select class="form-control ob" class="ob" data-type="select" data-msj="Seleccione un requerimiento" name="type">
                                        <option value="0" disabled selected>Seleccione Tipo De Requerimiento</option>
                                        <option value="Hora Extra">Hora Extra</option>
                                        <option value="Recado Medico">Recado Médico</option>
                                        <option value="Certificado Medico">Certificado Médico</option>
                                        <option value="Orden de Examen">Orden De Exámen</option>
                                        <option value="Seguro complementario">Seguro Complementario</option>
                                        <option value="Receta Medica">Receta Médica</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-8 mt-8"></div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Número de solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" readonly value="{{"R-".date('dmy'.date('gis'))}}" name="number_solicity">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Día y Hora</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="date-time" readonly type="datetime-local" class="form-control"
                                           placeholder="Fecha" name="datetime_local">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Estado</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control" name="state" readonly>
                                        <option value="Ingresado">Ingresado</option>
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
                                    <p class="mb-0">RUT (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="RUT form-control ob" data-type="text" data-msj="Ingrese un RUT"  placeholder="RUT" name="rut">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Primer nombre (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese un nombre" placeholder="Primer nombre" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Apellido Paterno (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese el apellido paterno" placeholder="Apellido Paterno"
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
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese el apellido materno" placeholder="Apellido Materno"
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
                                    <input type="text" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" placeholder="Fono celular" name="phone1">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono celular 2</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" placeholder="Fono celular 2" name="phone2">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono fijo 1 (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" data-type="number" data-msj="Ingrese número fijo" placeholder="Fono fijo 1" name="fije1">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Email (*)</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="email" class="form-control ob" data-type="mail" data-msj="Ingrese un correo" placeholder="Ingrese un Email" name="email">
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
                                    <select id="clinics" class="form-control ob selectpicker" data-live-search="true" data-type="select" data-msj="Seleccione una Clínica" name="clinic_id"
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
                                    <p class="mb-0">Sucursal</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="branches" class="form-control ob" data-live-search="true" data-type="select" data-msj="Seleccione una Sucursal" name="branch_id"
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
                                    <select id="center_medics" class="form-control ob" data-live-search="true" data-type="select" data-msj="Seleccione un Centro Médico" name="center_medical_id"
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
                                    <select id="units" class="form-control ob" data-live-search="true" data-type="select" data-msj="Seleccione una Unidad" name="unit_id"
                                            onchange="selectProfessionals()">
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
                                    <select id="professionals" class="form-control ob" data-live-search="true" data-type="select" data-msj="Seleccione un profesional" name="professional_id">
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
                                    <select id="especialities" class="form-control ob" data-live-search="true" data-type="select" data-msj="Seleccione una Especialidad" name="especiality_id">
                                        <option value="0" selected disabled>Seleccione Especialidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha Creación</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="date" type="date" class="form-control" readonly name="date">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha Probable H.E</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" name="date_he">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha Probable respuesta</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="date_response" type="date" class="form-control" name="date_response" value="<?php echo date("Y-m-d");?>">
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-12 mt-20">
                            <hr>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripcion de solicitud</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observación 1" rows="5"
                                              name="description1"></textarea>
                                </div>
                                <button id="sec-obs" class="mt-16 ml-8 btn-primary border-0 br-4">Segunda observacion</button>
                                <button id="tri-obs" class="mt-16 ml-8 btn-primary border-0 br-4">Tercera observacion</button>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8" id="segunda-observacion" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripcion de solicitud 2</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observación 2" rows="5"
                                              name="description2"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8" id="tercera-observacion" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripcion de solicitud 3</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observación 3" rows="5"
                                              name="description3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-16 d-none" style="">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Respuesta del centro médico</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Respuesta del centro médico" rows="5"
                                              name="response_medic"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-16 d-none">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha y hora del ticket solucionado</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" disabled name="date_solution">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8 d-none">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Usuario que crea la solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" readonly
                                           name="user_create" value="{{Auth::user()->name_complete}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8 d-none">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha de cierre de la solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" disabled name="date_close">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8 d-none">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Usuario que cierra la solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="Pedro Martinez" disabled
                                           name="user_close">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                                    <hr>
                                    <button id="btn-registrar-requerimiento" type="submit"
                                            class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                                            style="min-width:190px;"> Registrar
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
        $(document).ready(function () {

            $('#professionals').on('change', function(e){
                e.preventDefault();

                var idProf = $('option:selected', this).val();
                console.log(idProf);

                $.ajax({
                    type: "GET",
                    url: uri + "sla/" + idProf,
                    success: function (response) {

                        var someDate = new Date();
                        var dias = response['sla'];
                        var numberOfDaysToAdd = parseInt(dias);
                        someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
                        var dd = someDate.getDate();
                        var mm = someDate.getMonth() + 1;
                        var y = someDate.getFullYear();
                        var someFormattedDate = y + '-'+ mm + '-'+ dd;

                        console.log(someFormattedDate);
                        $('#date_response').val (someFormattedDate);

                    },
                    error: function (error) {
                        console.log(error);
                    }
                });

                selectEspecialitiesSLA(idProf);
                selectEspecialities();
            });





            let now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            $('#date-time').val(now.toISOString().slice(0, 16))
            $('#date').val(now.toISOString().split('T')[0])
        });

        $('#sec-obs').on('click', function(e){
            e.preventDefault();
            $('#segunda-observacion').fadeIn();
        });

        $('#tri-obs').on('click', function(e){
            e.preventDefault();
            $('#tercera-observacion').fadeIn();
        });

        // GUARDAR REQUERIMIENTO

        $('#btn-registrar-requerimiento').on('click', function(e){
        e.preventDefault();
        console.log("inicio-sesion");

        var validacion_datos = ValidadorAuto('.ob');

        if(validacion_datos == "true"){
            $('#frm-nuevo-requerimiento').submit();
        }else{
            return false;
        }

    });

/*
    $('.RUT').on('keyup', function(){
        let valor = $(this).val();
        let longitud = $(this).val().length;
        console.log(longitud);

        if(longitud == 2){
            $(this).val(valor + ".");
        }else if(longitud == 6){
            $(this).val(valor + ".");
        }
        else if(longitud == 10){
            $(this).val(valor + "-");
        }else {
            $(this).val(valor);
        }
    });*/
    </script>
@endpush
