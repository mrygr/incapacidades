<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // Hacer conexión con base de datos
        $servername = "localhost";
        $username_db = "root";
        $password_db = "tu_contraseña";
        $dbname = "incapacidades_empresa";

        $conn=mysqli_connect("localhost", "root", "", "incapacidades_empresa");

        if (!$conn) {
            die("La conexión ha fallado: " . mysqli_connect_error());
        }

        // Obtiene los datos del usuario de la base de datos
        $sql = "SELECT id_colaborador, password FROM colaboradores WHERE id_colaborador = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verifica la contraseña encriptada
            if (password_verify($password, $hashed_password)) {
                echo "Inicio de sesión exitoso. ¡Bienvenido, $username!";
                header("Location: ../index.php");
                exit();
            } else {
                echo "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
                header("Location: login.php");
                exit();
            }
        } else {
            echo "Usuario no encontrado.";
            header("Location: login.php");
            exit();
        }

        $conn->close();
    } else {
        echo "Por favor, proporciona un nombre de usuario y contraseña.";
        header("Location: login.php");
        exit();
    }
}
?>