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
        // Barajo las cartas y las guardo en mazo
        $mazo = $this->baraja->getBaraja();
        // Muestro el mazo
        $this->pages->render('baraja/muestraBaraja', ['mazo' => $mazo]);
    }

    public function sacarCarta(): void {
        $cartaSacada = $this->baraja->sacarCarta();
        $mazoRestante = $this->baraja->getBaraja();
        $this->pages->render('baraja/muestraBaraja', [
            'cartaSacada' => $cartaSacada,
            'mazo' => $mazoRestante
        ]);
    }

    public function repartirCartas(): void {
        $jugadores = $_POST['jugadores'] ?? null;

        if ($jugadores) {
            $montones = $this->baraja->repartir((int)$jugadores);
            $this->pages->render('baraja/repartirCartas', ['montones' => $montones, 'jugadores' => $jugadores]);  
        } else {
            $this->pages->render('baraja/repartirCartas');
        }
    }
}
