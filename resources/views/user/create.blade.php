@extends('layouts.app')
@section('title','Nuevo Usuarios')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">REGISTRO DE USUARIO</h2>
            <p>Ingrese los datos a continuación para registrar un nuevo usuario</p>
        </div>
        <form id="frm-registro-usuario" method="POST" action="{{route('app.user.save')}}">
            <div class="row mt-48 mb-36">
                @csrf
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Tipo de usuarios</p>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control ob tipo_usuario" data-type="select" data-msj="Seleccione un Rol" name="role_id">
                                        <option selected disabled value="0">Seleccione Rol De Usuario</option>
                                        @foreach($roles as $rol)
                                            <option value="{{$rol->id}}">{{$rol->display_name}}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-control mt-16 listado-clinicas" style="display:none;" name="clinic_id">
                                        <option disabled selected>Seleccione clinica</option>
                                        @foreach($clinics as $clinic)
                                        <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Nombres y Apellidos</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="text" data-msj="Ingrese Nombres y Apellidos" placeholder="Nombres y Apellidos"
                                           name="name_complete">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">RUT</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" data-type="text" data-msj="Ingrese un RUT" placeholder="#RUT" name="rut">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Correo</p>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control ob" data-type="mail" data-msj="Ingrese un correo" placeholder="Correo electrónico"
                                           name="email">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-8">
                            <div class="row align-items-center">
                                <div class="col-lg-5 text-left font-weight-bold">
                                    <p class="mb-0">Password</p>
                                </div>
                                <div class="col-lg-7">
                                    <input id="pass" type="password" class="form-control ob" data-type="text" data-msj="Ingrese un Password" placeholder="Password" name="password">
                                    <input id="re-pass" type="password" class="form-control mt-16 ob" data-type="text" data-msj="Confirme su Password" placeholder="Confirmar Password"
                                           name="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-8">
                    <div class="row align-items-center">
                        <div class="col-lg-12 text-left text-lg-center font-weight-bold">
                            <hr>
                            <button id="btn-registrar-usuario" type="submit"
                                    class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                                    style="min-width:190px;"> Registrar Usuario
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="text-left">
            <h2 class="text-pri">Registro de usuarios mediante Excel(.xls)</h2>
            <p>Usted puede cargar múltiples usuarios a través de un formato Excel(.xls) <a href="#">(Descargar formato
                    de prueba)</a></p>
        </div>

        <div class="row mt-48 mb-36">
            <div class="col-lg-4 mt-8">
                <div class="row align-items-center">
                    <div class="col-lg-5 text-left font-weight-bold">
                        <p class="mb-0">Carga Excel (.xls)*</p>
                    </div>
                    <div class="col-lg-7">
                        <input type="file" class="form-control" placeholder="RUT">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-8">
                <button class="btn bg-pri border-pri text-white pl-24 pr-24 mt-sm-20 font-weight-bold"
                        style="min-width:190px;"> Cargar Usuarios
                </button>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
    $('.tipo_usuario').on('change', function(){
        var tipo_usuario = $('option:selected', this).val();

        if(tipo_usuario == "4"){
            $('.listado-clinicas').css({'display':'block'});
        }else{
            $('.listado-clinicas').css({'display':'none'});
        }
    });

    $('#btn-registrar-usuario').on('click', function(e){
        e.preventDefault();
        var password = $('#pass').val();
        var re_password = $('#re-pass').val();

        var validacion_datos = ValidadorAuto('.ob');

        if(validacion_datos == "true"){
            if(password == re_password){
                $('#frm-registro-usuario').submit();
            }else{
                Swal.fire({
                        type: 'warning',
                        title: 'Password no coinciden',
                        text: 'Por favor ingrese la misma contraseña en ambos campos.'
                    });
                return false;
            }

        }else{
            return false;
        }

    });
</script>
@endpush
