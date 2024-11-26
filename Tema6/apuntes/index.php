<?php 

class Persona {
    public function __construct(private string $dni, 
        private string $nombre, private string $apellido){}

    public function getNombre(){
        return $this->nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function __toString(){
        return "<br>Persona: " . $this->nombre . " " . $this->apellido;
    }
}

class Cliente extends Persona {
    public function __construct($dni, $nombre, $apellido, private int $saldo){
        parent::__construct($dni,$nombre,$apellido);
    }
    
    public function getSaldo(){
        return $this->saldo;
    }

    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }

    public function __toString(){
        return "<br> - Cliente: " . $this->getNombre() . " " 
        . $this->getApellido() . ", saldo: " . $this->saldo . " euros.";
    }
}


$jose = new Persona("74682585L","Jose","Alferez");
echo $jose->getNombre();
echo $jose->getApellido();

echo $jose;

$cliente = new Cliente("123456789P","Carlos","Alferez",250000);
echo $cliente;
