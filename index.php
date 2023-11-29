<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="navbar-brand">
            <img src="img/user.png" alt="Foto del empleado" width="40" height="40">
            <a href="#" class="d-none d-md-inline"></a>
        </div>
        <div class="navbar-nav">
            <a href="#" id="cerrar-sesion"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script>
        $(document).ready(function() {
    // Agregar evento de clic al enlace de cerrar sesión
         $('#cerrar-sesion').on('click', function(e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

        // Redirigir a la página de inicio de sesión (cambiar 'login.php' por tu ruta correcta)
        window.location.href = 'login/login.php';
    });
});
</script>
        </div>
    </nav>

    <!--<nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>-->    
    <?php
$id_colaborador = '10258547896'; // Debes tener una función o método que obtenga el id_colaborador
?>
    <div class="options-container">
        <div class="option-box">
            <a href="ver-incapacidades.php?id_colaborador=<?php echo $id_colaborador; ?>" class="option-link">
                <div class="option-image">
                    <img src="img/shinc.png" alt="Ver Incapacidades">
                </div>
                <div class="option-text">
                    <p class="option-title">Ver Incapacidades</p>
                </div>
            </a>
        </div>
        <div class="option-box">
            <a href="report-form.php" class="option-link">
                <div class="option-image">
                    <img src="img/newinc.png" alt="Reportar Incapacidad">
                </div>
                <div class="option-text">
                    <p class="option-title">Reportar Incapacidad</p>
                </div>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
