$(document).ready(function () {
    var idColaborador = $("#idColaborador").text().trim();

    // Realizar petición AJAX al servidor para obtener las incapacidades
    $.ajax({
        url: 'php/cargar_incapacidades.php?id_colaborador=' + idColaborador,
        type: 'GET',
        dataType: 'json', // Esperamos datos en formato JSON
        success: function (data) {
            // Limpiar el contenido actual de la tabla
            $('#incapacidades-table tbody').empty();

            // Si hay incapacidades, mostrar la tabla
            if (data.length > 0) {
                // Iterar sobre los datos y agregar filas a la tabla
                $.each(data, function (index, incapacidad) {
                    var row = `<tr>
                        <td>${incapacidad.id_incapacidad}</td>
                        <td>${incapacidad.fecha_hora}</td>
                        <td>${incapacidad.tipo_incapacidad}</td>
                        <td>${incapacidad.estado_incapacidad}</td>
                    </tr>`;
                    $('#incapacidades-table tbody').append(row);
                });

                // Mostrar la tabla
                $('#incapacidades-table').show();
            } else {
                // Si no hay incapacidades, mostrar el contenedor con la imagen y mensaje
                $('#no-incapacidades-container').show();
                $('#crear-incapacidad-btn').hide();
            }
        },
        error: function (error) {
            console.error('Error al cargar incapacidades:', error);
        }
    });
});