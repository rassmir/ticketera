@extends('layouts.app')
@section('title','Nuevo Requerimiento')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">NUEVO REQUERIMIENTO</h2>
        </div>
        <form method="POST" action="{{route('app.requeriment.store')}}">
            @csrf
            <div class="row mt-48 mb-36">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Número de solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="R-15242021" disabled>
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
                                    <select class="form-control" name="state">
                                        <option value="Ingresado">Ingresado</option>
                                        <option value="Ingresado">Cerrado</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">RUT*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese un RUT"  placeholder="RUT" name="rut">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Primer nombre*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese un Nombre" placeholder="Primer nombre" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Apellido Paterno*</p>
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
                                    <p class="mb-0">Apellido Materno*</p>
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
                                    <input type="text" class="form-control" placeholder="Fono celular" name="phone1">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono celular 2</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="Fono celular 2" name="phone2">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono fijo 1*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="number" data-msj="Ingrese número fijo" placeholder="Fono fijo 1" name="fije1">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Clinica</p>
                                </div>
                                <div class="col-lg-7">
                                    <select id="clinics" class="form-control ob" data-type="select" data-msj="Seleccione una Clínica" name="clinic_id"
                                            onchange="selectBranches()">
                                        @foreach($clinics as $clinic)
                                            <option selected disabled value="0">Seleccione clínica</option>
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
                                    <select id="branches" class="form-control ob" data-type="select" data-msj="Seleccione una Sucursal" name="branch_id"
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
                                    <select id="center_medics" class="form-control ob" data-type="select" data-msj="Seleccione un Centro Médico" name="center_medical_id"
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
                                    <select id="units" class="form-control ob" data-type="select" data-msj="Seleccione una Unidad" name="unit_id"
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
                                    <select id="professionals" class="form-control ob" data-type="select" data-msj="Seleccione un profesional" name="professional_id"
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
                                    <select id="especialities" class="form-control ob" data-type="select" data-msj="Seleccione una Especialidad" name="especiality_id">
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
                                    <p class="mb-0">Fecha ùltima consulta</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" name="date_last">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha Probable respuesta</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" name="date_response">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Email*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="mail" data-msj="Ingrese un correo" placeholder="Ingrese un Email" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Observación del paciente</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observación" rows="5"
                                              name="observation"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-16">
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

                        <div class="col-lg-12 mt-16">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left  font-weight-bold">
                                    <p class="mb-0">Nombre del profesional</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <input type="text" class="form-control" placeholder="Nombre del profesional"
                                           name="name_professional">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-16">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Resumen de Gestión</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Respuesta del centro médico" rows="5"
                                              name="resumen"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-16">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha y hora del ticket solucionado</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" disabled name="date_solution">
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
                                           name="user_create" value="{{Auth::user()->name_complete}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha de cierre de la solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" disabled name="date_close">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
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
            let now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            $('#date-time').val(now.toISOString().slice(0, 16))
            $('#date').val(now.toISOString().split('T')[0])
        });

        const selectBranches = () => {
            let clinic_id = $("#clinics").val();
            $.ajax({
                type: "GET",
                url: "sucursales/" + clinic_id,
                success: function (response) {
                    let branches = $('#branches');
                    branches.empty();
                    branches.append('<option selected disabled>Seleccione Sucursal</option>');
                    for (let i = 0; i < response.length; i++) {
                        branches.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        const selectCenterMedic = () => {
            let branch_id = $("#branches").val();
            $.ajax({
                type: "GET",
                url: "centros-medicos/" + branch_id,
                success: function (response) {
                    let centers = $('#center_medics');
                    centers.empty();
                    centers.append('<option selected disabled>Seleccione Centro Médico</option>');
                    for (let i = 0; i < response.length; i++) {
                        centers.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        const selectUnits = () => {
            let center_medical_id = $("#center_medics").val();
            $.ajax({
                type: "GET",
                url: "unidades/" + center_medical_id,
                success: function (response) {
                    let units = $('#units');
                    units.empty();
                    units.append('<option selected disabled>Seleccione Unidad</option>');
                    for (let i = 0; i < response.length; i++) {
                        units.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        const selectProfessionals = () => {
            let units = $("#units").val();
            $.ajax({
                type: "GET",
                url: "profesionales/" + units,
                success: function (response) {
                    let professionals = $('#professionals');
                    professionals.empty();
                    professionals.append('<option selected disabled>Seleccione Profesional</option>');
                    for (let i = 0; i < response.length; i++) {
                        professionals.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        const selectEspecialities = () => {
            let professionals = $("#professionals").val();
            $.ajax({
                type: "GET",
                url: "especialidades/" + professionals,
                success: function (response) {
                    let especialities = $('#especialities');
                    especialities.empty();
                    especialities.append('<option selected disabled>Seleccione Especialidad</option>');
                    for (let i = 0; i < response.length; i++) {
                        especialities.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        // GUARDAR REQUERIMIENTO

        $('#btn-registrar-requerimiento').on('click', function(e){
        e.preventDefault();
        console.log("inicio-sesion");

        var validacion_datos = ValidadorAuto('.ob');

        if(validacion_datos == "true"){
            $('#frm-registro-usuario').submit();
        }else{
            return false;
        }

    });
    </script>
@endpush
