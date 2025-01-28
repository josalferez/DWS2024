<?php
// index.php

require_once 'lib/autoloader.php';

use Controllers\PacienteController;

$pacienteController = new PacienteController();
$pacienteController->mostrarTodos();