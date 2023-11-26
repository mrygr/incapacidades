// Lógica para mostrar mensajes específicos al seleccionar el tipo de incapacidad

$(document).ready(function () {
    function mostrarMensaje() {
        var tipoIncapacidad = $("#tipoIncapacidad").val();
        var mensaje = '';

        switch (tipoIncapacidad) {
            case 'enfermedad':
                mensaje = 'Los documentos que debe enviar son los siguientes: Certificado de la incapacidad con días de incapacidad y diagnóstico.';
                break;
            case 'accidenteTransito':
                mensaje = 'Los documentos que debe enviar son los siguientes: Certificado de la incapacidad con días de incapacidad y diagnóstico. FURIPS.';
                break;
            case 'accidenteLaboral':
                mensaje = 'Los documentos que debe enviar son los siguientes: Certificado de la incapacidad con días de incapacidad y diagnóstico.';
                break;
            case 'licenciaMaternidad':
                mensaje = 'Los documentos que debe enviar son los siguientes: Certificado de la incapacidad o documento donde se especifique las semanas de gestación al momento del parto, certificado de nacido vivo, registro civil, fotocopia del documento de identidad de la madre.';
                break;
            case 'licenciaPaternidad':
                mensaje = 'Los documentos que debe enviar son los siguientes: Certificado de la incapacidad o documento donde se especifique las semanas de gestación al momento del parto, certificado de nacido vivo, registro civil, fotocopia del documento de identidad de la madre.';
                break;
        }

        // Actualiza el contenido y clase de la alerta
        if(mensaje != ''){        
            $("#mensajeIncapacidad").html('<strong>Mensaje:</strong><br>' + mensaje);
            $(".alert").removeClass("d-none").addClass("alert-success");
        } else {
            $(".alert").removeClass("alert-success").addClass("d-none");
        }
    }

    $("#tipoIncapacidad").change(function () {
        mostrarMensaje();
    });

    mostrarMensaje();
});