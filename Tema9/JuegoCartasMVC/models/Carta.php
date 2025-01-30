<?php
namespace Models;

class Carta {
    private $numero;
    private $palo;

    public function __construct($numero, $palo) {
        $this->numero = $numero;
        $this->palo = $palo;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getPalo() {
        return $this->palo;
    }
}