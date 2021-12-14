@extends('layouts.app')
@section('title','Subir Excel')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
    <div class="col-lg-12 mt-8 border p-48">
                    <div class="row align-items-center">
                        <div class="col-lg-12 text-center font-weight-bold">
                            <img src="{{asset('assets/img/icono-excel.png')}}" width="100">
                            <h2 class="mt-16">Agregar detalles de anulación XXX</h2>
                            <p class="mb-0">Carga Excel (.xls)*</p>
                        </div>
                        <div class="col-lg-12 text-center mt-20">
                            <input type="file" class="form-control m-auto" placeholder="RUT" style="max-width:400px;">
                            <a class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold mt-24" style="min-width:190px;"> Subir registros</a>
                        </div>
                    </div>
                </div>
    </div>


@endsection
