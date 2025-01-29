<?php
namespace Models;

class Carta {
    const PALOS = ["ESPADAS", "OROS", "COPAS", "BASTOS"];
    const NUMEROS = [1 => "as", 2 => "dos", 3 => "tres", 4 => "cuatro", 5 => "cinco", 6 => "seis", 7 => "siete", 8 => "ocho", 9 => "nueve", 10 => "sota", 11 => "caballo", 12 => "rey"];

    public function __construct(public int $numero, public string $palo) {
        if (!in_array($this->palo, self::PALOS) || !array_key_exists($this->numero, self::NUMEROS)) {
            throw new InvalidArgumentException("Invalid card number or suit.");
        }
    }

    public function __toString(): string {
        return self::NUMEROS[$this->numero] . " de " . $this->palo;
    }

    public function getNumero(): int {
        return $this->numero;
    }

    public function getPalo(): string {
        return $this->palo;
    }
}