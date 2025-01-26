<?php
// Incluimos el autoloader y los archivos necesarios
require 'conexion.php';
require 'autoload.php';

// Usamos el controlador de Paciente
use Controllers\PacienteController;

// Instanciamos el controlador
$pacienteController = new PacienteController();

// Llamamos al método para mostrar todos los pacientes
$pacienteController->mostrarTodos();
?>