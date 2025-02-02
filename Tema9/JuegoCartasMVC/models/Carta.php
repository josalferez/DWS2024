<?php
namespace Models;

class Carta {
    // Uso la nueva forma de constructor
    public function __construct(private int $numero, private string $palo) {}

    public function getNumero(): int {
        return $this->numero;
    }

    public function getPalo(): string {
        return $this->palo;
    }
}
