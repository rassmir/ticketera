function validIsNullOrEmpty(valor) {
    if (valor == null) {
        return true;
    }
    if (valor == "") {
        return true;
    }
    return false;
}


function validIsNullOrEmptyOrZero(valor) {
    if (valor == null) {
        return true;
    }
    if (valor == "") {
        return true;
    }
    if (valor == 0 || valor == "0") {
        return true;
    }
    return false;
}


function validIsNullOrEmptOrMinusOne(valor) {
    if (valor == null) {
        return true;
    }
    if (valor == "") {
        return true;
    }
    if (valor == -1 || valor == "-1") {
        return true;
    }
    return false;
}

function onlyNumbers(valor) {
    var regex = new RegExp("^[0-9]+$");
    if (!regex.test(valor)) {
        return false;
    }
    return true;
}

/* --- VALIDAR CAMPOS POR CLASE --- */
function ValidadorAuto(clase) {
    var retorno = "true";

    $(clase).each(function () {

        var ide = $(this).data("ide");
        var msj_val = $(this).data("msj");
        var type = $(this).data("type");
        var valor = $(this).val();
        var campo = jQuery(this);

        $(clase).css({'border':'1px solid #e9ecef'});

        if (msj_val == "") {
            msj_val = "Debe llenar todos los campos";
        }

        switch (type) {
            case "text":


                //campo.remove();

                if (!valor) {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Parece que hubo un error',
                        text: msj_val
                    });

                    campo.css({'border': '2px solid #df2517'});

                    retorno = "false";
                    return false;
                }

                break;
            case "number":
                if (validIsNullOrEmpty(valor) || !onlyNumbers(valor)) {
                    Swal.fire({
                        type: 'error',
                        title: 'Parece que hubo un error',
                        text: msj_val
                    });
                    $(this).css({'border': '2px solid #df2517'});

                    retorno = "false";
                    return false;
                }
                break;

                case "mail":
                    if (valor.indexOf('@', 0) == -1 || valor.indexOf('.', 0) == -1) {
                        Swal.fire({
                            type: 'error',
                            title: 'Parece que hubo un error',
                            text: 'El formato de correo electrónico introducido no es correcto, por ejemplo: prueba@correo.com'
                            //text: msj_val
                        });
                        $(this).css({'border': '2px solid #df2517'});

                        retorno = "false";
                        return false;
                    }
                break;

            case "select":
                if (validIsNullOrEmptOrMinusOne(valor) || validIsNullOrEmptyOrZero(valor)) {
                    Swal.fire({
                        type: 'error',
                        title: 'Parece que hubo un error',
                        text: msj_val
                    });
                    $(this).css({'border': '2px solid #df2517'});

                    retorno = "false";
                    return false;
                }
                break;

            case "date":
                var dateFecha = new Date(valor);
                var dateFechaHoy = new Date(fechaHoy());

                if (validIsNullOrEmpty(valor) == true || dateFecha.getTime() > dateFechaHoy.getTime()) {
                    Swal.fire({
                        type: 'error',
                        title: 'Parece que hubo un error',
                        text: msj_val
                    });
                    $(this).css({'border': '2px solid #df2517'});

                    retorno = "false";
                    return false;
                }
                break;
        }

    });

    return retorno;
}

const deleteRegister = (id, url, csrf) => {
    Swal.fire({
        title: "Estás seguro que deseas eliminar?",
        text: "No podras recuperar este registro !!",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#ff0000",
        confirmButtonText: "Si, eliminar",
        closeOnConfirm: false,
        allowOutsideClick: false,
        preConfirm: () => {
            $.ajax({
                type: "POST",
                url: `${url}` + '/' + id,
                data: {
                    id: id,
                    _token: `${csrf}`
                },
                dataType: "html",
                success: function (response) {
                    console.log(response);
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    })
}

$('.tipo_usuario').on('change', function(){
    var tipo_usuario = $('option:selected', this).val();

    if(tipo_usuario == "4"){
        $('.listado-clinicas').css({'display':'block'});
    }else{
        $('.listado-clinicas').css({'display':'none'});
    }
});

$(document).ready(function () {
    var tipo_usuario = $('option:selected', this).val();

    if (tipo_usuario == "4") {
        $('.listado-clinicas').css({'display': 'block'});
    } else {
        $('.listado-clinicas').css({'display': 'none'});
    }
});

 let uri = 'http://localhost:8000/';
//let uri ='https://banmedica.herokuapp.com/';

const selectBranches = () => {
    let clinic_id = $("#clinics").val();
    $.ajax({
        type: "GET",
        url: uri + "sucursales/" + clinic_id,
        success: function (response) {
            let branches = $('#branches');
            branches.empty();
            branches.append('<option selected disabled>Seleccione Sucursal</option>');
            for (let i = 0; i < response.length; i++) {
                branches.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
            }
            branches.selectpicker();
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
        url: uri + "centros-medicos/" + branch_id,
        success: function (response) {
            let centers = $('#center_medics');
            centers.empty();
            centers.append('<option selected disabled>Seleccione Centro Médico</option>');
            for (let i = 0; i < response.length; i++) {
                centers.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
            }
            centers.selectpicker();
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
        url: uri + "unidades/" + center_medical_id,
        success: function (response) {
            let units = $('#units');
            units.empty();
            units.append('<option selected disabled>Seleccione Unidad</option>');
            for (let i = 0; i < response.length; i++) {
                units.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
            }
            units.selectpicker();
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
        url: uri + "profesionales/" + units,
        success: function (response) {
            let professionals = $('#professionals');
            professionals.empty();
            professionals.append('<option selected disabled>Seleccione Profesional</option>');
            for (let i = 0; i < response.length; i++) {
                professionals.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
            }
            professionals.selectpicker();
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
        url: uri + "especialidades/" + professionals,
        success: function (response) {
            let especialities = $('#especialities');
            especialities.empty();
            especialities.append('<option selected disabled>Seleccione Especialidad</option>');
            for (let i = 0; i < response.length; i++) {
                especialities.append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
            }
            especialities.selectpicker();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

const selectEspecialitiesSLA = (idProfesional) => {

    $.ajax({
        type: "GET",
        url: uri + "sla/" + idProfesional,
        success: function (response) {
            console.log(response);
        },
        error: function (error) {
            console.log(error);
        }
    });
}
