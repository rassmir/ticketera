@extends('layouts.app')
@section('title','Buscar Requerimiento')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">

        <div class="text-left">
            <h2 class="text-pri">LISTADO DE REQUERIMIENTOS</h2>
            <p class="font-20 font-pri">Muestra las acciones realiza por los usuarios</p>
        </div>
        <div class="mt-48 mb-36">
            <form method="GET" action="{{route('app.requeriment.index')}}" class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Clínica</p>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control" name="clinic_name">
                                    <option selected disabled>Filtro por clínica</option>
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
                                <p class="mb-0">Nº Requerimiento</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="#" name="rq_name">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Desde</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" class="form-control" placeholder="Desde">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-8">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-left">
                                <p class="mb-0">Hasta</p>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" class="form-control" placeholder="Hasta">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 text-center mt-8">
                <button class="btn bg-sec border-sec text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                        style="min-width:190px;" type="submit"><i class="fas fa-search"></i> Buscar
                </button>
            </div>
            </form>
            <!-- TABLA -->
            <div class="col-lg-12 mt-36">
                <hr>
                <div class="table-responsive">
                    <table id="table-requerimientos" class="table table-striped table-bordered b-table mt-24">
                        <thead>
                        <tr class="bg-pri text-white">
                            <th># Requerimiento</th>
                            <th>RUT Paciente</th>
                            <th>Fecha ingreso</th>
                            <th>Estado</th>
                            <th>Clínica</th>
                            <th>Sucursal</th>
                            <th>Centro médico</th>
                            <th>Unidad</th>
                            <th>Médico</th>
                            <th>Especialidad</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requeriments as $key=> $req)
                            <tr>
                                <td>{{$req->number_solicity}}</td>
                                    <td>{{$req->rut}}</td>
                                    <td>{{$req->datetime_local}}</td>
                                    <td>{{$req->state}}</td>
                                    <td>{{$req->clinicname}}</td>
                                    <td>{{$req->branchname}}</td>
                                    <td>{{$req->centername}}</td>
                                    <td>{{$req->unitname}}</td>
                                    <td>{{$req->profname}}</td>
                                    <td>{{$req->spename}}</td>
                                    <td>
                                        <ul class="d-lg-flex">

                                            <li><a href="ver-requerimiento/{{$req->id}}"
                                                   class="btn bg-tri mr-12 text-black"><i class="far fa-eye"></i></a>
                                            </li>
                                            @if(!Auth::user()->hasRole('administrador'))
                                                <li><a href="editar-requerimiento/{{$req->id}}" class="btn bg-tri mr-12 text-black"><i
                                                            class="far fa-edit"></i></a></li>
                                                            @endif
{{--                                                <li>--}}
{{--                                                    <button onclick="confirmDelete({{$req->id}})"--}}
{{--                                                            class="btn bg-tri mr-12 text-black"><i--}}
{{--                                                            class="fas fa-trash"></i></button>--}}
{{--                                                </li>--}}
                                            </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- {{$requerimiento}} --}}
                    <div class="col-lg-4">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"></div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">

        // GRFICOS

        const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// FIN DE GRAFICOS


        const confirmDelete = (id) => {
            deleteRegister(id, 'eliminar-requerimiento', '{{csrf_token()}}');
        }
        $(document).ready(function () {
            $('#table-requerimientos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5,6,7,8,9]
                    }
                },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5,6,7,8,9]
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
                    columns: [0, 1, 2, 3, 4, 5,6,7,8,9]
                }

            });
        });
    </script>
@endpush
