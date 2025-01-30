<?php
namespace Models;

class Baraja {
    private $cartas = [];

    public function __construct() {
        $palos = ['oros', 'copas', 'espadas', 'bastos'];
        for ($i = 1; $i <= 12; $i++) {
            foreach ($palos as $palo) {
                $this->cartas[] = new Carta($i, $palo);
            }
        }
    }

    public function getBaraja() {
        return $this->cartas;
    }
}