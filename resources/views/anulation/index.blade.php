@extends('layouts.app')
@section('title','Buscar Anulación')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">LISTADO DE ANULACIONES</h2>
        </div>

        <div class="mt-48 mb-36">
            <form method="get" action="{{route('app.anulation.index')}}" class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Clínica</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control" name="clinic_name">
                                        <option disabled selected>Seleccione clínica</option>
                                        @foreach($clinics as $clinic)
                                        <option value="{{$clinic->name}}">{{$clinic->name}}</option>
                                        @endforeach
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
                                    <select class="form-control" name="center_name">
                                        <option disabled selected>Seleccione Centro médico</option>
                                        @foreach($centers as $center)
                                            <option value="{{$center->name}}">{{$center->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-center mt-8">
                    <button type="submit" class="btn bg-sec border-sec text-white pl-20 pr-20 mt-sm-20 font-weight-bold"
                            style="min-width:190px;"><i class="fas fa-search"></i> Buscar
                    </button>
                    <a href="{{url('buscar-anulaciones')}}" class="btn btn-primary font-14 br-4 pl-20 pr-20">Limpiar</a>
                </div>
            </form>
            <!-- TABLA -->

            <div class="col-lg-12 mt-20">
                <hr>
                <div class="table-responsive">
                    <table id="table-anulaciones" class="table table-striped table-bordered b-table mt-24">
                        <thead>
                        <tr class="bg-pri text-white">
                            <th>#</th>
                            <th>Numero Anulación</th>
                            <th>Clínica</th>
                            <th>Centro médico</th>
                            <th>Nombre Doctor</th>
                            <th>Especialidad</th>
                            <th>Obs secretaria</th>
                            <th>Motivo anulación</th>
                            <th>Estado solicitud</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($anulations as $anula)
                        <tr>
                            <td>{{$anula->id}}</td>
                            <td>{{$anula->number_ticket}}</td>
                            <td>{{$anula->clinicname}}</td>
                            <td>{{$anula->centername}}</td>
                            <td>{{$anula->profname}}</td>
                            <td>{{$anula->espname}}</td>
                            <td>{{$anula->message}}</td>
                            <td>{{$anula->anulation}}</td>
                            <td>{{$anula->state}}</td>
                            <td>
                                <ul class="d-lg-flex">

                                    <li><a href="/ver-anulacion/{{$anula->id}}" data-toggle="tooltip" data-placement="top" title="Ver detalle" class="opt-listado"><i class="far fa-eye mr-12 font-16"></i></a></li>
                                    @if(!Auth::user()->hasRole('administrador'))
                                    <li><a href="/editar-anulacion/{{$anula->id}}" data-toggle="tooltip" data-placement="top" title="Editar" class="opt-listado"><i class="far fa-edit mr-12 font-16"></i></a></li>

                                    <li><a href="/subir-excel/{{$anula->number_ticket}}" data-toggle="tooltip" data-placement="top" title="Subir registros" class="opt-listado"><i class="far fa-file-excel mr-12 font-16"></i></a></li>
                                    <li><a href="/detalle-anulacion?n_ticket={{$anula->number_ticket}}" data-toggle="tooltip" data-placement="top" title="Detalles de registros" class="opt-listado"><i class="far fa-file-alt font-16"></i></a></li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">



        $(document).ready(function () {
            $('#table-anulaciones').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
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
                    columns: [0, 1, 2, 3, 4, 5, 6,]
                }

            });



            $('.opt-listado').tooltip();
        });
    </script>
@endpush
