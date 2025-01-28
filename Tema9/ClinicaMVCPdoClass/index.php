<?php
// index.php

// Incluyo el archivo de configuración
require_once 'config/config.php';

//Incluyo el autoloader
require_once 'lib/autoloader.php';

use Controllers\PacienteController;

$pacienteController = new PacienteController();
$pacienteController->mostrarTodos();