<?php

class Empleado{
    public $Nombre;
    public $Apellidos;    

    public function setNombre($nombre){
        $this->Nombre = $nombre;
    }
    
    public function setApellidos($apellidos){
        $this->Apellidos = $apellidos;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getApellidos(){
        return $this->Apellidos;
    }

    public function __toString()
    {
        return "<br> - Empleado: " . $this->Nombre . " " . $this->Apellidos . "<br>"; 
    }
}

$emp = new Empleado;

$emp->setNombre('Juan');
$emp->setApellidos('Alvarez Manzano');
echo $emp;
?>