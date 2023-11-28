<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // Establece la conexión con la base de datos
        $servername = "127.0.0.1";
        $username_db = "tu_usuario";
        $password_db = "tu_contraseña";
        $dbname = "incapacidades_empresa";

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        if ($conn->connect_error) {
            die("La conexión ha fallado: " . $conn->connect_error);
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
                // Puedes redirigir a otra página después de un inicio de sesión exitoso usando header()
                // header("Location: otra_pagina.php");
                // exit();
            } else {
                echo "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
            }
        } else {
            echo "Usuario no encontrado.";
        }

        $conn->close();
    } else {
        echo "Por favor, proporciona un nombre de usuario y contraseña.";
    }
}
?>