<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capturar datos del formulario
    $nombre = $_POST["nombre"];
    $identificacion = $_POST["identificacion"];
    $tipoIncapacidad = $_POST["tipoIncapacidad"];
    $archivos = $_FILES["archivos"];

    // Capturar fecha y hora actual
    date_default_timezone_set('America/Bogota');
    $fechaHora = date("Y-m-d H:i:s");

    // Crear la carpeta para guardar los archivos
    $fechaHoraFormateada = str_replace([':', ' '], '-', $fechaHora);
    $carpetaArchivos = "../reportes/{$nombre}/{$fechaHoraFormateada}/";

    if (!file_exists($carpetaArchivos)) {
        mkdir($carpetaArchivos, 0777, true);
    }

    // Guardar cada archivo en la carpeta
    $mensajes = [];

    foreach ($archivos["tmp_name"] as $key => $tmp_name) {
        $archivoNombre = $archivos["name"][$key];
        $rutaArchivo = $carpetaArchivos . $archivoNombre;

        if (move_uploaded_file($tmp_name, $rutaArchivo)) {
            $mensajes[] = "Archivo '{$archivoNombre}' subido correctamente.";
        } else {
            $mensajes[] = "Error al subir el archivo '{$archivoNombre}'.";
        }
    }

    // Conectar a la base de datos (ajusta los valores según tu configuración)
    $conexion = new mysqli("localhost", "root", "", "incapacidades_empresa");

    // Verificar la conexión
    if ($conexion->connect_error) {
        $mensajes[] = "Error de conexión a la base de datos: " . $conexion->connect_error;
    } else {
        // Insertar datos en la base de datos
        $query = "INSERT INTO incapacidades (tipo_incapacidad, fecha_hora, ruta_archivos, id_colaborador) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("ssss", $tipoIncapacidad, $fechaHora, $carpetaArchivos, $identificacion);

        if ($stmt->execute()) {
            $mensajes[] = "Datos guardados correctamente en la base de datos.";
        } else {
            $mensajes[] = "Error al guardar datos en la base de datos: " . $stmt->error;
        }

        // Cerrar la conexión y liberar recursos
        $stmt->close();
        $conexion->close();
    }

    // Devolver mensajes como respuesta
    echo implode("\n", $mensajes);
}
?>
