<?php

// public/index.php
require_once __DIR__ . '/../models/Monedero.php';
require_once __DIR__ . '/../controllers/MonederoController.php';

$controller = new MonederoController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'agregar':
        $controller->agregar();
        break;
    case 'buscar':
        $controller->buscar();
        break;
    case 'borrar':
        $controller->borrar();
        break;
    case 'editar':
        $controller->editar();
        break;
    default:
        $controller->index();
        break;
}
