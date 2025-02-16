<?php
class Coche
{
    public function __construct(
        public string $color='Rojo',
        public string $marca='Ferrari',
        public string $modelo='Aventador',
        public int $velocidad=300,
        public int $caballos=500,
        public int $plazas=2 
    ) {}

    public function setColor($color)
    {
        $this->color = $color;
    }
    public function frenar()
    {
        $this->velocidad--;
    }

    public function acelerar()
    {
        $this->velocidad++;
    }

    public function mostrarInformacion()
    {
        return  "<br>Marca: " . $this->marca . 
                "<br>Modelo: " . $this->modelo . 
                "<br>Color: " . $this->color .
                "<br>Velocidad: " . $this->velocidad . 
                "<br>Caballos: " . $this->caballos . 
                "<br>Plazas: " . $this->plazas;
    }

    public function __toString()
    {
        return $this->mostrarInformacion();
    }
}
