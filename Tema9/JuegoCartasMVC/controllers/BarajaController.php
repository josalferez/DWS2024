<?php
namespace Controllers;

use Models\Baraja;
use Lib\Pages;

class BarajaController {
    private Baraja $baraja;
    private Pages $pages;

    public function __construct(Pages $pages) {
        $this->baraja = new Baraja();
        $this->pages = $pages;
    }

    public function mostrarBaraja(bool $barajar = false): void {
        if ($barajar) {
            $this->baraja->barajar();
        }
        $mazo = $this->baraja->getBaraja();
        $this->pages->render('baraja/muestraBaraja', ['mazo' => $mazo]);
    }
}
