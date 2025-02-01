<?php
namespace Controllers;

use Lib\Pages;
use Controllers\BarajaController;

class FrontController {
    public static function main() {
        $pages = new Pages();
        $barajaController = new BarajaController($pages);

        $accion = $_GET['accion'] ?? 'mostrar';
        $barajar = isset($_GET['barajar']) && $_GET['barajar'] === 'true';

        if ($accion === 'mostrar') {
            $barajaController->mostrarBaraja($barajar);
        } elseif ($accion === 'sacarCarta'){
            $barajaController->sacarCarta();
        } elseif ($accion==='repartirCartas') {
            $barajaController->repartirCartas();
        }
    }


}

