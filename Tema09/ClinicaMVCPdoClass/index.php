<?php
// index.php

// Incluyo el archivo de configuración
require_once 'config/config.php';

// Incluyo el vendor/autoload.php
require_once 'vendor/autoload.php';

//Incluyo el autoloader
//require_once 'lib/autoloader.php';

// Incluyo la cabecera de la página
require_once __DIR__ . '/views/partials/header.php';

use Controllers\PacienteController;
use Controllers\DoctorController;

$action = $_GET['action'] ?? 'mostrarTodos'; // Acción por defecto
$controller = new PacienteController();

// Enrutamiento básico
switch ($action) {
    case 'mostrarTodos':
        $controller->mostrarTodos();
        break;
    case 'registro':
        $controller->mostrarFormularioRegistro();
        break;
    case 'guardar':
        $controller->guardar();
        break;
    default:
        echo "Página no encontrada";
        break;
}

// Incluyo el footer de la página
require_once __DIR__ . '/views/partials/footer.php';

