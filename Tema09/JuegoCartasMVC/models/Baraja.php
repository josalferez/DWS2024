<?php
namespace Models;

class Baraja {
    private $cartas = [];

    public function __construct() {
        $this->inicializarBaraja();
    }

    private function inicializarBaraja() {
        $palos = ['oros', 'copas', 'espadas', 'bastos'];
        for ($i = 1; $i <= 12; $i++) {
            foreach ($palos as $palo) {
                $this->cartas[] = new Carta($i, $palo);
            }
        }
    }

    public function barajar() {
        shuffle($this->cartas);
    }

    public function getBaraja() {
        return $this->cartas;
    }

    // Saco la primera carta de la baraja y la elimino de la baraja
    public function sacarCarta(): ?Carta {
        $this->barajar();
        return array_shift($this->cartas); 
    }

    public function repartir(int $jugadores): array {
        if ($jugadores <= 0){
            return [];
        }

        $montones = array_fill(0,$jugadores,[]);
        $index = 0;

        $this->barajar();

        foreach ($this->cartas as $carta) {
            $montones[$index % $jugadores][] = $carta;
            $index++;
        }
        return $montones;
    }
}
