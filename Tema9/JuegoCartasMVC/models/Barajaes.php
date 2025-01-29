<?php
namespace Models;

class Barajaes {
    private array $baraja;

    public function __construct() {
        $this->baraja = [];
        foreach (Carta::PALOS as $palo) {
            foreach (array_keys(Carta::NUMEROS) as $numero) {
                $this->baraja[] = new Carta($numero, $palo);
            }
        }
        $this->barajar();
    }


    public function barajar(): void {
        shuffle($this->baraja);
    }

    public function sacarCarta(): ?Carta {
        return array_shift($this->baraja);
    }

    public function getBaraja(): array {
        return $this->baraja;
    }
}