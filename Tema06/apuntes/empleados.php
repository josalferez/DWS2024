<?php

class Empleado{
    public $Nombre;
    public $Apellidos;    

    public function __construct($nombre=null,$apellidos=null)
    {
        $this->Nombre = $nombre;
        $this->Apellidos = $apellidos;        
    }
    
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

$emp = new Empleado();

$emp->setNombre('Juan');
$emp->setApellidos('Alvarez Manzano');
echo $emp;

$emp2 = new Empleado("Pedro","Paramo");
echo $emp2;
?>

