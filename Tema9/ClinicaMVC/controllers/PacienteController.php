<?php

namespace Controllers;

use Models\Paciente;

class PacienteController {
    private $paciente;

    public function __construct() {
        $this->paciente = new Paciente();
    }

    // Método para mostrar todos los pacientes
    public function mostrarTodos() {
        $pacientes = $this->paciente->getAll();
        require 'views/paciente/mostrar_todos.php';
    }
}
?>