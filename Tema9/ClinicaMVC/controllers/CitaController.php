<?php 

namespace Controllers;

use Models\Cita;

class CitaController {
    private $cita;

    public function __construct() {
        $this->cita = new Cita();
    }

    // Método para mostrar todas las citas
    public function mostrarTodos() {
        $citas = $this->cita->getAll();
        require 'views/cita/mostrar_todos.php';
    }
}