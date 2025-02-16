<?php

class Perro {
    private $tamaño;
    private $raza;
    private $color;
    private $nombre;

    // Constructor
    public function __construct($tamaño, $raza, $color, $nombre) {
        $this->set_tamaño($tamaño);
        $this->set_raza($raza);
        $this->set_color($color);
        $this->set_nombre($nombre);
    }

    // Métodos set
    public function set_tamaño($tamaño) {
        if (is_string($tamaño) && strlen($tamaño) <= 21) {
            $this->tamaño = $tamaño;
            return true;
        }
        return false;
    }

    public function set_raza($raza) {
        if (is_string($raza) && strlen($raza) <= 21) {
            $this->raza = $raza;
            return true;
        }
        return false;
    }

    public function set_color($color) {
        if (is_string($color) && strlen($color) <= 21) {
            $this->color = $color;
            return true;
        }
        return false;
    }

    public function set_nombre($nombre) {
        if (is_string($nombre) && strlen($nombre) <= 21) {
            $this->nombre = $nombre;
            return true;
        }
        return false;
    }

    // Métodos get
    public function get_tamaño() {
        return $this->tamaño;
    }

    public function get_raza() {
        return $this->raza;
    }

    public function get_color() {
        return $this->color;
    }

    public function get_nombre() {
        return $this->nombre;
    }

    // Método para mostrar propiedades
    public function mostrar_propiedades() {
        echo "El tamaño del perro es {$this->tamaño}, su color es {$this->color}, su raza es {$this->raza}, y su nombre es {$this->nombre}.";
    }

    // Método speak
    public function speak() {
        echo "¡Guau guau! Soy {$this->nombre}.";
    }
}
?>
