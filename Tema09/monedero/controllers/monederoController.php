<?php 

// controllers/MonederoController.php

class MonederoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Monedero();
    }

    public function index() {
        $registros = $this->modelo->obtenerRegistros();
        include __DIR__ . '/../views/listar.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha = $_POST['fecha'] ?? '';
            $concepto = $_POST['concepto'] ?? '';
            $importe = $_POST['importe'] ?? '';
            
            $resultado = $this->modelo->agregarRegistro($fecha, $concepto, $importe);
            if ($resultado !== true) {
                echo "<p style='color:red;'>$resultado</p>";
            }
        }
        header('Location: /');
    }

    public function buscar() {
        $concepto = $_GET['concepto'] ?? '';
        $registros = $this->modelo->buscarRegistro($concepto);
        include __DIR__ . '/../views/listar.php';
    }

    public function borrar() {
        $indice = $_POST['indice'] ?? -1;
        $this->modelo->borrarRegistro($indice);
        header('Location: /');
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $indice = $_POST['indice'] ?? -1;
            $fecha = $_POST['fecha'] ?? '';
            $concepto = $_POST['concepto'] ?? '';
            $importe = $_POST['importe'] ?? '';
            $this->modelo->editarRegistro($indice, $fecha, $concepto, $importe);
        }
        header('Location: /');
    }
}