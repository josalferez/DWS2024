<?php
// Incluimos el autoloader y los archivos necesarios
require 'conexion.php';
require 'autoload.php';

// Usamos el controlador de Paciente
use Controllers\PacienteController;

// Instanciamos el controlador
$pacienteController = new PacienteController();

// Usamos el controlador de Doctor
use Controllers\DoctorController;

// Creamos una instancia de Doctor
$doctorController = new DoctorController();


// Usamos el controlador de Cita
use Controllers\CitaController;

// Creamos una instancia de Cita
$citaController = new CitaController();

// Llamamos al método para mostrar todos los pacientes
$pacienteController->mostrarTodos();
// Llamamos al método para mostrar todos los doctores
$doctorController->mostrarTodos();

// Llamamos al método para mostrar todas las citas
//$citaController->mostrarTodos();


?>