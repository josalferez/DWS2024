<?php
class Coche
{
    public function __construct(
        public string $color='',
        public string $marca='',
        public string $modelo='',
        public int $velocidad=0,
        public int $caballos=0,
        public int $plazas=1 
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
