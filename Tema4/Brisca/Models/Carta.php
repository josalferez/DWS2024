<?php
namespace Models;

class Carta{
    // Creamos las constantes de los palos y las cartas.
    const PALOS = ["OROS", "COPAS", "ESPADAS", "BASTOS"];
    const CARTAS = [1=>"AS", 2=>"2", 3=>"3", 4=>"4", 5=>"5", 6=>"6", 7=>"7", 8=>"8", 9=>"9", 10=>"SOTA", 11=>"CABALLO", 12=>"REY"];

    // Creamos las propiedades de la clase.
    public function __construct(
        private int $numero,
        private string $palo
    ){
            
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
            return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
            $this->numero = $numero;

            return $this;
    }

    /**
     * Get the value of palo
     */ 
    public function getPalo()
    {
            return $this->palo;
    }

    /**
     * Set the value of palo
     *
     * @return  self
     */ 
    public function setPalo($palo)
    {
            $this->palo = $palo;

            return $this;
    }

    public function __toString()
    {
        $numero = self::CARTAS[$this->numero];
        return "La carta " . $numero . " de " . $this->palo;
    }


    public static function comprobarNumero($numero) :bool{
        return array_key_exists(strtoupper($numero), self::CARTAS); // Al ser un array asociativo, no podemos usar in_array, sino array_key_exists. Ya que in_array solo funciona con arrays indexados.
    }

    // Comprobamos si existe el palo y esta en el array PALOS
    public static function comprobarPalo($palo) : bool{
        return in_array($palo, self::PALOS);
    }

}








?>