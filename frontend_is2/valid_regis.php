<?php
// Establece la conexión a la base de datos (Asegúrate de ajustar estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "incapacidades_empresa";

// Crea la conexión
$conn = mysqli_connect("localhost", "root", "", "incapacidades_empresa");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtén los datos del formulario
$nombre = $_POST['Nombre'];
$cedula = $_POST['Cedula'];
$email = $_POST['Email'];
$contrasena = $_POST['Contraseña'];

// Prepara y ejecuta la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO registro (nombre, cedula, email, contrasena) VALUES ('$nombre', '$cedula', '$email', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente";
    header("location: ../index.php");
} else {
    echo "Error al guardar el registro: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>
