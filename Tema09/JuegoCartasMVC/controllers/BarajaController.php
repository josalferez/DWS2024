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
        
        // 1. Usamos los métodos de la clase Baraja
        if ($barajar) {
            $this->baraja->barajar();
        }
            // Barajo las cartas y las guardo en mazo
        $mazo = $this->baraja->getBaraja();
        
        // 2. Mostramos la vista - Muestro el mazo
        $this->pages->render('baraja/muestraBaraja', ['mazo' => $mazo]);
    }

    public function sacarCarta(): void {

        // 1. Usamos los métodos de la clase Baraja
        $cartaSacada = $this->baraja->sacarCarta();
        $mazoRestante = $this->baraja->getBaraja();

        // 2. Mostramos la vista
        $this->pages->render('baraja/muestraBaraja', ['cartaSacada' => $cartaSacada, 'mazo' => $mazoRestante]);
    }

    public function repartirCartas(): void {

        // 1. Usamos los métodos de la clase baraja
        $jugadores = $_POST['jugadores'] ?? null;

        if ($jugadores) {
            $montones = $this->baraja->repartir((int)$jugadores);

        // 2. Mostramos la vista
            $this->pages->render('baraja/repartirCartas', ['montones' => $montones, 'jugadores' => $jugadores]);  
        } else {
        
        // 2. O mostramos esta vista
            $this->pages->render('baraja/repartirCartas');
        }
    }
}
