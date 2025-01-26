<?php 

// controllers/DoctorController.php
namespace Controllers;

use Models\Doctor;

class DoctorController {
    private $doctor;

    public function __construct() {
        $this->doctor = new Doctor();
    }

    // Método para mostrar todos los doctores
    public function mostrarTodos() {
        $doctores = $this->doctor->getAll();
        require 'views/doctor/mostrar_todos.php';
    }
}
