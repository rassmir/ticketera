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

        //$(clase).css({'border':'1px solid #e9ecef'});

        if (msj_val == "") {
            msj_val = "Debe llenar todos los campos";
        }

        switch (type) {
            case "text":

                campo.css({'border': '2px solid ##df2517'});
                //campo.remove();

                if (!valor) {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Parece que hubo un error',
                        text: msj_val
                    });

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
                    $(this).css({'border': '2px solid ##df2517'});

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
                    $(this).css({'border': '2px solid ##df2517'});

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
                    $(this).css({'border': '2px solid ##df2517'});

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
