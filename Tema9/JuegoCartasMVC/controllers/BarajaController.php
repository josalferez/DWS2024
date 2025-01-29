<?php
namespace Controllers;

use Models\Barajaes;
use Lib\Pages; // Assuming you have a Lib/Pages.php for templating

class BarajaController {
    public function mostrarBaraja(): void {
        $baraja = new Barajaes();
        $pages = new Pages();
        $pages->render('baraja/muestraBaraja', ['mazo' => $baraja->getBaraja()]);
    }
}