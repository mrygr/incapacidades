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

    $("#reportForm").submit(function(e) {
        e.preventDefault();

        // Mostrar animación de carga
        $(".loading-container").show();
        $(".error-container").hide();

        // Enviar formulario con AJAX
        $.ajax({
            url: "php/guardar_incapacidad.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            xhr: function() {
                var xhr = new XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(event) {
                    if (event.lengthComputable) {
                        var percent = Math.round((event.loaded / event.total) * 100); 
                        $(".loading-text").text("Subiendo archivos... " + percent + "%");
                    }
                }, false);
                return xhr;
            },
            success: function(response) {
                setTimeout(function() {
                    // Ocultar formulario y animación de carga
                    $(".loading-container").hide();
                    
                    // Manejar respuesta
                    if (response.includes("Error")) {
                        // Mostrar mensaje de error en rojo
                        $(".error-container").show();
                        $(".error-container").text(response).css("color", "red");
                    } else {
                        $(".error-container").hide();
                        $("#reportForm").hide();                        
                        $("#success-container").show();
                        $("#mensajeExito").text("Incapacidad reportada correctamente");
                        // Redireccionar a index.php después de 2 segundos
                        setTimeout(function() {
                            window.location.href = "index.php";
                        }, 2000);
                    }
                }, 1000);
            },
            error: function(xhr, status, error) {
                // Mostrar mensaje de error en rojo
                $(".error-container").text("Error al enviar el formulario. Por favor, inténtalo de nuevo.").css("color", "red");
                
                // Ocultar animación de carga y mostrar el formulario nuevamente
                $(".loading-container").hide();
                $("#reportForm").show();
            }
        });
    });
});