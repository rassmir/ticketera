@extends('layouts.app')
@section('title','Buscar Anulación')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">LISTADO DE ANULACIONES</h2>
        </div>
        <div class="row mt-48 mb-36">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Clínica</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Clinica 1</option>
                                    <option>Clinica 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Centro médico</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Seleccione un centro médico</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 text-center mt-8">
                <button class="btn bg-sec border-sec text-white pl-24 pr-24 mt-sm-20 font-weight-bold" style="min-width:190px;"> <i class="far fa-search"></i> Buscar</button>
            </div>

            <!-- TABLA -->

            <div class="col-lg-12 mt-20">
                <hr>
                <div class="table-responsive">
                    <table id="table-anulaciones" class="table table-striped table-bordered b-table mt-24">
                        <thead>
                        <tr class="bg-pri text-white">
                            <th>#</th>
                            <th>Centro médico</th>
                            <th>Nombre Doctor</th>
                            <th>Especialidad</th>
                            <th>Obs secretaria</th>
                            <th>Usuario creación Req</th>
                            <th>Motivo anulación</th>
                            <th>Estado solicitud</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>47854645</td>
                            <td>La Dehesa</td>
                            <td>Carmen Paz</td>
                            <td>Psicopedagoga</td>
                            <td>Por favor reagendar segùn disponibilidad</td>
                            <td>Camila Romero</td>
                            <td>Otros</td>
                            <td>Ingresado</td>
                            <td>
                                <ul class="d-lg-flex">
                                    <li><i class="far fa-eye mr-12"></i></li>
                                    <li><i class="far fa-edit mr-12"></i></li>
                                </ul>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table-anulaciones').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                'print'
                ],
                exportOptions: {
                    modifier: {
                        // DataTables core
                        order: 'index', // 'current', 'applied',
                        //'index', 'original'
                        page: 'all', // 'all', 'current'
                        search: 'none' // 'none', 'applied', 'removed'
                    },
                    columns: [0, 1, 2, 3, 4, 5]
                }

            });
        });
    </script>
@endpush
