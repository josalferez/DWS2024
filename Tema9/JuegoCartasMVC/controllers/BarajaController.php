<?php
namespace Controllers;

use Models\Baraja;
use Lib\Pages;

class BarajaController {
    private Baraja $baraja;
    private Pages $pages;

    public function __construct() {
        $this->baraja = new Baraja();
        $this->pages = new Pages();
    }

    public function mostrarBaraja(): void {
        $mazo = $this->baraja->getBaraja();
        $this->pages->render('baraja/muestraBaraja', ['mazo' => $mazo]);
    }
}