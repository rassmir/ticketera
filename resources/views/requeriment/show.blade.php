@extends('layouts.app')
@section('title','Ver Requerimiento')
@section('app-content')



    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">



        <div class="text-left">
            <h2 class="text-pri">VER REQUERIMIENTO : {{$requeriment->rut}} <a href="{{ url('/editar-requerimiento/'.$requeriment->id) }}" class="btn-light ml-16 font-16 p-8 br-4 pl-20 pr-20"><i class="far fa-edit"></i> Editar requerimiento</a></h2>
        </div>
            <div class="row mt-48 mb-36">
                <div class="col-lg-12">
                    <div class="row">
                    <div class="col-lg-12 mt-20">
                            <h3 class="font-20">Datos del requerimiento</h3>
                            <hr>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Número de solicitud</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="R-15242021" readonly value="{{$requeriment->number_solicity}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Día y Hora</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="date-time" readonly type="datetime" class="form-control"
                                           placeholder="Fecha" name="datetime_local" value="{{$requeriment->datetime_local}}">
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
                                        <option>{{$requeriment->state}}</option>
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
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese un RUT"  placeholder="RUT" name="rut" readonly value="{{$requeriment->rut}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Primer nombre*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese un nombre" placeholder="Primer nombre" name="name" readonly value="{{$requeriment->name}}">
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
                                           name="father_name" readonly value="{{$requeriment->father_name}}">
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
                                           name="mother_name" readonly value="{{$requeriment->mother_name}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono celular 1</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="Fono celular" name="phone1" readonly value="{{$requeriment->phone1}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono celular 2</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="Fono celular 2" name="phone2" readonly value="{{$requeriment->phone2}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fono fijo 1*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="number" data-msj="Ingrese número fijo" placeholder="Fono fijo 1" name="fije1" readonly value="{{$requeriment->fije1}}">
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
                                    <select id="clinics" class="form-control ob" data-type="select" data-msj="Seleccione una Clínica" name="clinic_id" disabled>
                                            <option selected disabled value="0">{{$requeriment->clinicname}}</option>
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
                                    <select id="branches" class="form-control ob" data-type="select" data-msj="Seleccione una Sucursal" name="branch_id" disabled>
                                        <option value="0" selected disabled>{{$requeriment->braname}}</option>
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
                                    <select id="center_medics" class="form-control ob" data-type="select" data-msj="Seleccione un Centro Médico" name="center_medical_id" disabled>
                                        <option value="0" selected disabled>{{$requeriment->centername}}</option>
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
                                    <select id="units" class="form-control ob" data-type="select" data-msj="Seleccione una Unidad" name="unit_id" disabled>
                                        <option value="0" selected disabled>{{$requeriment->unitname}}</option>
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
                                    <select id="professionals" class="form-control ob" data-type="select" data-msj="Seleccione un profesional" name="professional_id" disabled>
                                        <option value="0" selected disabled>{{$requeriment->profname}}</option>
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
                                    <select id="especialities" class="form-control ob" data-type="select" data-msj="Seleccione una Especialidad" name="especiality_id" disabled>
                                        <option value="0" selected disabled>{{$requeriment->espname}}</option>
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
                                    <input id="date" type="date" class="form-control" readonly name="date" value="{{$requeriment->date}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha Probable H.E</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" name="date_he" readonly value="{{$requeriment->date_he}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha ùltima consulta</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" name="date_last" readonly value="{{$requeriment->date_last}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha Probable respuesta</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" name="date_response" readonly value="{{$requeriment->date_response}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Email*</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="mail" data-msj="Ingrese un correo" placeholder="Ingrese un Email" name="email" readonly value="{{$requeriment->email}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripción de solicitud</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observación" rows="5"
                                              name="observation" disabled>{{$requeriment->description1}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripción de solicitud 2</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observación" rows="5"
                                              name="observation" disabled>{{$requeriment->description2}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-left font-weight-bold">
                                    <p class="mb-0">Descripción de solicitud 3</p>
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <textarea class="form-control" placeholder="Ingrese una observación" rows="5"
                                              name="observation" disabled>{{$requeriment->description3}}</textarea>
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
                                              name="response_medic" readonly>{{$requeriment->response_medic}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-16">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Fecha y hora del ticket solucionado</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" readonly name="date_solution" value="{{$requeriment->date_solution}}">
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
                                    <input type="date" class="form-control" disabled name="date_close" readonly value="{{$requeriment->date_close}}">
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
                                           name="user_close" readonly value="{{$requeriment->user_close}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <hr>
                            <a href="{{url('buscar-requerimientos')}}" class="btn btn-primary font-14 br-4 pl-20 pr-20">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        let route = 'http://localhost:8000/';
        const selectBranches = () => {
            let clinic_id = $("#clinics").val();
            $.ajax({
                type: "GET",
                url: route + "sucursales/" + clinic_id,
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
                url: route + "centros-medicos/" + branch_id,
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
                url: route + "unidades/" + center_medical_id,
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
                url: route + "profesionales/" + units,
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
                url: route + "especialidades/" + professionals,
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
    </script>
@endpush
