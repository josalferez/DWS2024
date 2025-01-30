<?php
namespace Controllers;

use Lib\Pages;

class FrontController {
    public static function main() {
        $pages = new Pages(); // Se crea una instancia de Pages
        $barajaController = new BarajaController($pages); // Se pasa al constructor

        $accion = $_GET['accion'] ?? 'mostrar';
        $barajar = isset($_GET['barajar']) && $_GET['barajar'] === 'true';

        if ($accion === 'mostrar') {
            $barajaController->mostrarBaraja($barajar);
        }
    }
}
