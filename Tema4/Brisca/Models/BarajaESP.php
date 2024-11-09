<?php
namespace Models;
use Models\Carta;

class BarajaESP{
    private array $arrayBaraja;
    

    public function __construct(){
        $arrayBaraja = [];
        $palos = Carta::PALOS;
        for($i=0; $i<sizeof($palos); $i++){
            for($j=1; $j <= 12; $j++){
                $carta = new Carta($j, $palos[$i]);
                array_push($arrayBaraja,$carta);
            }
        }
        $this->setArrayBaraja($arrayBaraja);
    }

    /**
     * Get the value of arrayBaraja
     */ 
    public function getArrayBaraja()
    {
        return $this->arrayBaraja;
    }

    /**
     * Set the value of arrayBaraja
     *
     * @return  self
     */ 
    public function setArrayBaraja($arrayBaraja)
    {
        $this->arrayBaraja = $arrayBaraja;

        return $this;
    }

    public function barajarMazo(){
        shuffle($this->arrayBaraja);
    }

    public function extraerCarta(){
        $cartaExtraida = array_pop($this->arrayBaraja);
        $barajaSinCarta = $this->arrayBaraja;
        $this->setArrayBaraja($barajaSinCarta);
        return $cartaExtraida;
    }

    public function extraerCartaAleatoria(){
        $key = array_rand($this->arrayBaraja);
        $cartaExtraida = $this->arrayBaraja[$key];
        unset($this->arrayBaraja[$key]);
        $this->setArrayBaraja($this->arrayBaraja);
        return $cartaExtraida;
    }

 
}



?>