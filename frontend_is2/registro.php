
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title></title>
</head>

<body>
    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                
                <h4>Si ya tienes una cuenta por favor inicia sesion aqui</h4>
                <button class="sign-up-btn"><a href="../login/login.php">Iniciar Sesion</a></button>
            </div>
        </div>
        <form class="formulario" action="valid_regis.php" method="post">
            <h2 class="create-account">Registro</h2>
            
            <input type="text" placeholder="Nombre" name="Nombre">
            <input type="text" placeholder="Cedula" name="Cedula">
            <input type="email" placeholder="Email" name="Email">
            <input type="password" placeholder="Contraseña" name="Contraseña">
            <input type="submit" value="Registrarse">
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>
