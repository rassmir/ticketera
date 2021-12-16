@extends('layouts.app')
@section('title','Listar Usuarios')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">LISTADO DE USUARIOS</h2>
        </div>

        <div class="mt-48 mb-36">
            <form method="GET" action="{{route('app.user.index')}}" class="row">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-6 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">Tipo de usuario</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control" name="role_id">
                                        <option selected disabled>Filtro por usuario</option>
                                        @foreach($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->display_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left">
                                    <p class="mb-0">RUT</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="RUT" name="rut">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 text-center mt-8">
                    <button class="btn bg-sec border-sec text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                            style="min-width:190px;" type="submit">
                        <i class="fas fa-search"></i>
                        Buscar usuario
                    </button>
                </div>
            </form>
            <div class="col-lg-12 mt-20">
                <hr>
                <div class="table-responsive">
                    <table id="table-usuarios" class="table table-striped table-bordered b-table mt-24">
                        <thead>
                        <tr class="bg-pri text-white">
                            <th>#</th>
                            <th>Tipo de usuario</th>
                            <th>Nombres y Apellidos</th>
                            <th>RUT</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=> $user)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$user->rolname}}</td>
                                <td>{{$user->name_complete}}</td>
                                <td>{{$user->rut}}</td>
                                <td>
                                    <ul class="d-lg-flex">
                                        <li><a href="ver-usuario/{{$user->id}}" class="btn bg-tri mr-12 text-black"><i
                                                    class="far fa-eye"></i></a>
                                        </li>
                                        <li><a href="editar-usuario/{{$user->id}}"
                                               class="btn bg-tri mr-12 text-black"><i class="far fa-edit"></i></a>
                                        </li>
                                        <li>
                                            <button onclick="confirmDelete({{$user->id}})"
                                                    class="btn bg-tri mr-12 text-black"><i class="fas fa-trash"></i>
                                            </button>
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
        const confirmDelete = (id) => {
            deleteRegister(id, 'eliminar-usuario', '{{csrf_token()}}');
        }
        $(document).ready(function () {
            $('#table-usuarios').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
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
