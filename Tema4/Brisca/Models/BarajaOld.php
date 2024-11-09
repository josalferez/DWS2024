<?php
class Baraja {
    public $baraja;
    public $jugadores;

    public function __construct() {
        // Inicializa la baraja y los jugadores
        $this->baraja = [
            "oros" => [],
            "copas" => [],
            "espadas" => [],
            "bastos" => []
        ];
        $this->jugadores = [];  
    }

    public function crearBaraja($baraja) {
        foreach($baraja as $clave => $valor) {
            for($i=0;$i<12;$i++) {
                $puntuacion = 0;
                if($i == 0) {
                    // As
                    $puntuacion = 11;
                } else if($i == 2) {
                    // 3
                    $puntuacion = 10;
                } else if($i == 11) {
                    // Rey
                    $puntuacion = 4;
                } else if($i == 10) {
                    // Caballo
                    $puntuacion = 3;
                } else if($i == 9) {
                    // Sota
                    $puntuacion = 2;
                }
                $array = [
                    "puntuacion" => $puntuacion,
                    "imagen" => "img/" . $clave . "_" . $i + 1 . ".jpg",
                ];
                array_push($baraja[$clave], $array);
            }
        }
        return $baraja;
    }

    public function barajarBaraja($baraja) {
        // Baraja la baraja
        $barajaAleatoria = [];
        foreach($baraja as $clave => $valor) {
            foreach($valor as $carta) {
                $posicion = rand(0, 47);
                // comprobamos que la posición no esté ocupada
                while(isset($barajaAleatoria[$posicion])) {
                    $posicion = rand(0, 47);
                }
                $barajaAleatoria[$posicion] = $carta;
            }
        }
        return $barajaAleatoria;
    }

    public function repartirCartas($baraja, $jugador, $numCartas) {
        // Reparte las cartas a los jugadores
        $segundaBaraja = [];
        for($i=0; $i<count($baraja); $i++) {
            // Reparte la carta al jugador
            if($i<$numCartas){
            array_push($jugador, $baraja[$i]);
        }else{
            // El resto de cartas los almacena en otro array.
            array_push($segundaBaraja,$baraja[$i]);
        }
        }
        // Devolvemos la baraja y el jugador.
        return [$segundaBaraja,$jugador];
    }
}



?>