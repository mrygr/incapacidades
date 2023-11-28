<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/report-form.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/report-form.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="navbar-brand">
            <img src="img/user.png" alt="Foto del empleado" width="40" height="40">
            <a href="#" class="d-none d-md-inline">Nombre colaborador</a>
        </div>
        <div class="navbar-nav">
            <a href="#" id="cerrar-sesion"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
        </div>
    </nav>

    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reportar Incapacidad</li>
        </ol>
    </nav>    

    <div class="form-container">
        <form id="reportForm" enctype="multipart/form-data">
        <!--<form id="reportForm" enctype="multipart/form-data" action="php/guardar_incapacidad.php" method="post">-->
            <div class="form-group">
                <label for="nombre">Nombre Colaborador</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="identificacion">Identificación Colaborador</label>
                <input type="text" class="form-control" id="identificacion" name="identificacion" required>
            </div>
            <div class="form-group">
                <label for="tipoIncapacidad">Tipo de Incapacidad</label>
                <select class="form-control" id="tipoIncapacidad" name="tipoIncapacidad" required>
                    <option value=""></option>
                    <option value="enfermedad">Enfermedad Laboral</option>
                    <option value="accidenteTransito">Accidente de Tránsito</option>
                    <option value="accidenteLaboral">Accidente Laboral</option>
                    <option value="licenciaMaternidad">Licencia de Maternidad</option>
                    <option value="licenciaPaternidad">Licencia de Paternidad</option>
                </select>
            </div>
            <div class="form-group">
                <label for="archivos">Subir Archivos en PDF</label>
                <input type="file" class="form-control" id="archivos" name="archivos[]" multiple accept=".pdf" required>
            </div>
            <div class="alert d-none">
                <p id="mensajeIncapacidad"></p>
            </div>
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>

        <!-- Contenedor de carga -->
        <div class="loading-container" style="display: none;">
            <div class="loading-text">Subiendo archivos... <span class="loading-number">0</span>%</div>
            <div class="loading"></div>
        </div>
                
        <!-- Contenedor de éxito -->
        <div class="success-container" id="success-container" style="display: none;">
            <p id="mensajeExito"></p>
        </div>

        <!-- Contenedor de Error -->
        <div class="error-container"></div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>