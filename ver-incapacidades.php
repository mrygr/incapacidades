<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/cargar_incapacidades.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/ver-incapacidades.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="navbar-brand">
            <img src="img/user.png" alt="Foto del empleado" width="40" height="40">
            <a href="#" class="d-none d-md-inline">Nombre Colaborador</a>
        </div>
        <div class="navbar-nav">
            <a href="#" id="cerrar-sesion"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
        </div>
    </nav>

    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver Incapacidades</li>
        </ol>
    </nav>


        <!-- Contenedor para la imagen y mensaje cuando no hay incapacidades -->
    <div id="no-incapacidades-container" class="text-center mt-5">
        <img src="img/599.png" alt="No hay incapacidades" class="img-fluid">
        <p class="mt-3">No has reportado ninguna incapacidad</p>
        <a href="report-form.php" class="btn btn-primary btn-lg">
            <i class="fas fa-plus"></i> Nueva Incapacidad
        </a>
    </div>

    <div id="table-container">
        <a id="crear-incapacidad-btn" class="floating-btn" href="report-form.php">
            <i class="fas fa-plus"></i>
            <span>Crear Incapacidad</span>
        </a>

        <table id="incapacidades-table">
            <thead>
                <tr>
                    <th># Radicado</th>
                    <th>Fecha Reporte</th>
                    <th>Tipo Incapacidad</th>
                    <th>Estado</th>
                    <!-- Imprimir el valor de id_colaborador en una etiqueta p oculta -->
                    <p id="idColaborador" style="display: block;" hidden><?php echo $_GET['id_colaborador']; ?></p>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se cargarán las filas de la tabla dinámicamente con AJAX -->
            </tbody>
        </table>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
