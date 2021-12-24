@extends('layouts.app')
@section('title','Subir Excel')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">Detalles de Anulaciones</h2>
            <?php

            if(isset($_GET['n_ticket'])){
                $anulacion = "Anulación " . $_GET['n_ticket'];
            }else{
                $anulacion = "";
            }


            ?>
            <h3 class="text-light font-20"><?php echo $anulacion; ?></h3>
        </div>
        <div class="row mt-48 mb-36">
            <div class="col-lg-8">
                <form method="get" action="{{route('app.anulation.detailanulation')}}">
                    <div class="row">
                        <div class="col-lg-5 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Número de anulación</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="n_ticket">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 text-center mt-8">
                            <button type="submit"
                                    class="btn bg-sec border-sec text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                                    style="min-width:190px;"><i class="fas fa-search"></i> Buscar
                            </button>
                            <a href="{{url('detalle-anulacion')}}" class="btn btn-primary font-14 br-4 pl-20 pr-20"> Limpiar</a>
                            <a href="{{url('buscar-anulaciones')}}" class="btn btn-primary font-14 br-4 pl-20 pr-20"><i class="fas fa-arrow-left"></i> Regresar</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 mt-8">
            </div>

            <!-- TABLA -->

            <div class="col-lg-12 mt-20">
                <hr>
                <div class="table-responsive">
                    <table id="table-detalle-anulaciones" class="table table-striped table-bordered b-table mt-24">
                        <thead>
                        <tr class="bg-pri text-white">
                            <th>#</th>
                            <th>Número Anulación</th>
                            <th>Fecha Anulación</th>
                            <th>Hora</th>
                            <th>Paciente</th>
                            <th>Médico</th>
                            <th>Teléfono 1</th>
                            <th>Teléfono 2</th>
                            <th>Respuesta</th>
                            <th>Fecha de carga</th>
                            <th>Fecha de Cierre</th>
                            <th>Ejecutivo</th>
                            <th>Intentos</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $key=> $detail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$detail->number_ticket}}</td>
                                <td>{{$detail->date_anulation}}</td>
                                <td>{{$detail->hour}}</td>
                                <td>{{$detail->patient}}</td>
                                <td>{{$detail->name_doctor}}</td>
                                <td>{{$detail->phone1}}</td>
                                <td>{{$detail->phone2}}</td>
                                <td>{{$detail->response_anulation}}</td>
                                <td>{{$detail->date_load}}</td>
                                <td>{{$detail->date_close}}</td>
                                <td>{{$detail->executive}}</td>
                                <td>{{$detail->trys}}</td>
                                <td>
                                    <ul class="d-lg-flex">
                                        <li><a href="/ver-detalle-anulacion/{{$detail->id}}"><i
                                                    class="far fa-eye mr-12 font-16 opt-listado" data-toggle="tooltip" data-placement="top" title="Ver detalle"></i></a></li>
                                        @if(!Auth::user()->hasRole('administrador'))
                                            <li><a href="/editar-detalle-anulacion/{{$detail->id}}" data-toggle="tooltip" data-placement="top" title="Editar" class="opt-listado"><i
                                                        class="far fa-edit mr-12"></i></a></li>
                                        @endif
                                        <li>
                                            <form method="POST" action="{{route('app.anulation.delete.detailanulation',['id'=>$detail->id])}}">
                                            @csrf
                                            <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" class="opt-listado"  style="border: none;background: transparent;color: #1463a5;cursor: pointer;">
                                                <i class="far fa-trash-alt mr-12 font-16"></i>
                                            </button>
                                            </form>
                                        </li>
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

            $('.opt-listado').tooltip();

            $('#table-detalle-anulaciones').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                }

            });
        });
    </script>
@endpush
