<?php
class Coche
{
    public function __construct(
        public string $color,
        public string $marca,
        public string $modelo,
        public int $velocidad,
        public int $caballos,
        public int $plazas
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

    public function __toString()
    {
        return  "<br>Marca: " . $this->marca . "<br>Modelo: " . $this->modelo . "<br>Color: " . $this->color;
    }
}
