<?php
// Incluimos el autoloader y los archivos necesarios
require 'conexion.php';
require 'autoload.php';

// Cargo los controladores
use Controllers\PacienteController;
use Controllers\DoctorController;
use Controllers\CitaController;

// Instanciamos los controladores
$pacienteController = new PacienteController();
$doctorController = new DoctorController();
$citaController = new CitaController();

// Mostramos todos los pacientes y las citas. 
$pacienteController->mostrarTodos();
$citaController->mostrarTodos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi clinica</title>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS de Bootstrap (opcional, solo si necesitas funcionalidades como modales, tooltips, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    // Incluyo un formulario de login
    //include 'views/auth/login.php';
    ?>

</body>

</html>