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

// Mostramos todos los pacientes, doctores y citas. 
$pacienteController->mostrarTodos();
$doctorController->mostrarTodos();
$citaController->mostrarTodos();


?>