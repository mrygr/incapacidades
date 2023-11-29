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
            <a href="#" class="d-none d-md-inline"></a>
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
        <h1>Reportar incapacidad</h1>
        <form id="reportForm" enctype="multipart/form-data">
        <!--<form id="reportForm" enctype="multipart/form-data" action="php/guardar_incapacidad.php" method="post">-->
            <div class="form-group">
            <label for="nombre"><i class="fas fa-user"></i> Nombre Colaborador:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
            <label for="identificacion"><i class="fas fa-id-card"></i> Identificación:</label>
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
                <label for="archivos"> Soportes incapacidad en PDF:</label>
                <div class="custom-file-upload">
                    <input type="file" class="form-control" id="archivos" name="archivos[]" multiple accept=".pdf" style="display: none" required>
                    <a href="#" id="seleccionar-documentos">
                        <i class="fas fa-upload"></i> Seleccionar documentos
                    </a>
                </div>
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
                
        <div class="success-container" id="success-container" style="display: none;">
            <div class="success-icon">
                <span style="color: white; font-size: 40px;">✔</span>
            </div>
            <div class="success-text">Incapacidad Reportada Correctamente</div>
        </div>

        <!-- Contenedor de Error -->
        <div class="error-container" style="display: none;"></div>
    </div> 

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>