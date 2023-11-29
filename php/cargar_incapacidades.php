<?php
$id_colaborador = isset($_GET['id_colaborador']) ? $_GET['id_colaborador'] : null;

/*if ($id_colaborador == null) {
    echo "No se proporcionó el id_colaborador en la URL.";
} else {*/
    //echo $id_colaborador;
    $conexion = new mysqli("localhost", "root", "", "incapacidades_empresa");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consulta SQL para obtener las incapacidades del colaborador
    $query = "SELECT id_incapacidad, fecha_hora, tipo_incapacidad, estado_incapacidad FROM incapacidades WHERE id_colaborador = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $id_colaborador);

    // Verificar si la consulta fue exitosa
    if ($stmt->execute()) {
        // Obtener resultados
        $resultados = $stmt->get_result();

        // Obtener las incapacidades como un array asociativo
        $incapacidades = $resultados->fetch_all(MYSQLI_ASSOC);        
        
        // Devolver las incapacidades en formato JSON
        echo json_encode($incapacidades);

        // Cerrar la conexión y liberar recursos
        $stmt->close();
        $conexion->close();
    } else {
        // Manejar el error en caso de fallo en la consulta
        die("Error al obtener incapacidades: " . $stmt->error);
    }
//}
?>