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

    // Métodos getters
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

    // Métodos setters
    public function set_tamaño($tamaño) {
        $this->tamaño = $tamaño;
    }

    public function set_raza($raza) {
        $this->raza = $raza;
    }

    public function set_color($color) {
        $this->color = $color;
    }

    public function set_nombre($nombre) {
        if (is_string($nombre) && strlen($nombre) <= 21) {
            $this->nombre = $nombre;
            return true;
        } else {
            echo "Error: El nombre debe ser una cadena de caracteres y no exceder de 21 caracteres.\n";
            return false;
        }
    }

    // Método para mostrar propiedades
    public function mostrar_propiedades() {
        echo "<br>El tamaño del perro es {$this->tamaño}, su color es {$this->color}, su raza es {$this->raza} y su nombre es: {$this->nombre}.\n";
    }

    // Método para hacer hablar al perro
    public function speak() {
        echo "<br>¡Guau! Soy {$this->nombre}.\n";
    }
}

try {
    // Crear objeto Labrador
    $labrador = new Perro("Grande", "Labrador", "Amarillo", "Max");
    $labrador->mostrar_propiedades();
    $labrador->speak();

    // Cambiar el nombre del Labrador
    $perro_error_message = $labrador->set_nombre('Luna');
    print $perro_error_message ? '<br>Nombre actualizado correctamente' : '<br>Nombre no modificado';
    $labrador->mostrar_propiedades();

    // Crear objeto Caniche
    $caniche = new Perro("Pequeño", "Caniche", "Blanco", "Bella");
    $caniche->mostrar_propiedades();
    $caniche->speak();

} catch (Exception $e) {
    echo '<br>Error: ' . $e->getMessage();
}

?>