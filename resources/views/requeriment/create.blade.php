@extends('layouts.app')
@section('title','Nuevo Requerimiento')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">NUEVO REQUERIMIENTO</h2>
        </div>
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
                                <input type="date" class="form-control" placeholder="Fecha" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Estado</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Ingresado</option>
                                    <option>Cerrado</option>
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
                                <input type="text" class="form-control" placeholder="RUT">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Primer nombre*</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="Primer nombre">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Apellido Paterno*</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="Apellido Paterno">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Apellido Materno*</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="Apellido Materno">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Fono celular 1*</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="Fono celular">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Fono celular 2*</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="Fono celular 2">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Fono fijo 1*</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="Fono fijo 1">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Clinica</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Clinica 1</option>
                                    <option>Clinica 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Centro médico</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Centro médico 1</option>
                                    <option>Centro médico 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Profesional Tratante</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Profesional 1</option>
                                    <option>Profesional 2</option>
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
                                <select class="form-control">
                                    <option>Seleccionar especialidad</option>
                                    <option>Profesional 2</option>
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
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Fecha Probable H.E</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Fecha ùltima consulta</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Fecha Probable respuesta</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" plceholder="Ingrese un Email">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-left font-weight-bold">
                                <p class="mb-0">Observación del paciente</p>
                            </div>
                            <div class="col-lg-12 mt-8">
                                <textarea class="form-control" placeholder="Ingrese una observación" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-16">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-left font-weight-bold">
                                <p class="mb-0">Respuesta del centro médico</p>
                            </div>
                            <div class="col-lg-12 mt-8">
                                <textarea class="form-control" placeholder="Respuesta del centro médico" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-16">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-left  font-weight-bold">
                                <p class="mb-0">Nombre del profesional</p>
                            </div>
                            <div class="col-lg-12 mt-8">
                                <input type="text" class="form-control" placeholder="Nombre del profesional">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-16">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-left font-weight-bold">
                                <p class="mb-0">Resumen de Gestión</p>
                            </div>
                            <div class="col-lg-12 mt-8">
                                <textarea class="form-control" placeholder="Respuesta del centro médico" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-16">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Fecha y hora del ticket solucionado</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Usuario que crea la solicitud</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" palceholder="Juan Perez" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Fecha de cierre de la solicitud</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left font-weight-bold">
                                <p class="mb-0">Usuario que cierra la solicitud</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" palceholder="Pedro Martinez" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                                <hr>
                                <button class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;"> Registrar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
