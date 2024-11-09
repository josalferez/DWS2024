<?php

//Creamos una baraja
 $palos = ["oros","copas","bastos","espadas"];
 $valores = range(1,12);
 $ganadasJugador1 = [];
 $ganadasJugador2 = [];
 $baraja = [];
 $puntos = 0;

foreach ($palos as $palo)
 foreach ($valores as $valor) {
    $baraja[] = ['palo' => $palo,'valor' => $valor];
 }

 function imprimeBaraja($baraja){
    $ruta = 'imagenesCartas/';
    foreach ($baraja as $carta) {
        $archivoImagen = $ruta . $carta['palo'] . '_' . $carta['valor'] . '.jpg';
        echo "<img src='$archivoImagen' width='80' height='120'>";
    }
 }



 //La barajamos
 shuffle($baraja);


 //Contamos los puntos que hay en la baraja de cartas 
 contamosCartas($baraja,$puntos);

 //Reparto cartas a los jugadores de una en una
 $jugadores = [];
 for ($i=0; $i < 3; $i++) { 
    $jugadores['Jugador 1'][] = array_pop($baraja);
    $jugadores['Jugador 2'][] = array_pop($baraja);    
}

//Ponemos sobre la mesa la carta Triunfo
$cartaTriunfo = array_pop($baraja);
echo "<h1> La carta triunfo es: </h1>";
imprimeBaraja([$cartaTriunfo]);  //imprimeBaraja imprime un array de cartas. Imagina que fuera un array de enteros y que array_pop saca un entero a cartaTriunfo


 
//Contamos el valor de la baraja 1= 11 puntos, 3 = 10 puntos, 10 = 2 puntos, 11 = 3 puntos, 12 = 4 puntos
function contamosCartas($baraja,&$puntos){
    $puntos = 0;
    foreach ($baraja as $carta) {
        switch($carta['valor']){
            case 1: $puntos += 11;
                break;
            case 3: $puntos += 10;
                break;
            case 10: $puntos += 2;
                break;
            case 11: $puntos += 3;
                break;                
            case 12: $puntos += 4;
                break;
            }
    }
}

//Imprimimos los puntos que tienen en la mano cada jugador
contamosCartas($jugadores['Jugador 1'],$puntos);
echo "<br> Los puntos del jugador 1 son: " . $puntos;
contamosCartas($jugadores['Jugador 2'],$puntos);
echo "<br> Los puntos del jugador 2 son: " . $puntos;

function jugarBaza(&$jugadores, &$baraja, $cartaTriunfo, $ruta) {
    $cartasJugadas = [];
    foreach ($jugadores as $nombre => &$cartas) {
        $cartaJugada = array_pop($cartas); // Cada jugador juega una carta
        $cartasJugadas[] = ["jugador" => $nombre, "carta" => $cartaJugada];
        echo "$nombre juega: ";
        mostrarCarta($cartaJugada, $ruta);
        imprimeBaraja($cartaJugada);
        echo "<br>";
    }

    // Determinación del ganador de la baza
    $paloSalida = $cartasJugadas[0]["carta"]["palo"];
    $ganador = $cartasJugadas[0];
    foreach ($cartasJugadas as $jugada) {
        if (
            $jugada["carta"]["palo"] === $cartaTriunfo["palo"] &&
            ($ganador["carta"]["palo"] !== $cartaTriunfo["palo"] ||
                $jugada["carta"]["valor"] > $ganador["carta"]["valor"])
        ) {
            $ganador = $jugada;
        } elseif (
            $jugada["carta"]["palo"] === $paloSalida &&
            $jugada["carta"]["valor"] > $ganador["carta"]["valor"] &&
            $ganador["carta"]["palo"] !== $cartaTriunfo["palo"]
        ) {
            $ganador = $jugada;
        }
    }

    echo "Ganador de la baza: {$ganador['jugador']} con la carta ";
    mostrarCarta($ganador['carta'], $ruta);
    echo "<br>";

    // El ganador roba primero
    foreach ($jugadores as &$cartas) {
        if (count($baraja) > 0) {
            $cartas[] = array_pop($baraja);
        }
    }
}

// Simulamos jugar todas las bazas hasta que no queden cartas en la baraja
$baza = 1;
while (!empty($baraja)) {
    echo "<br><strong>Baza $baza</strong><br>";
    jugarBaza($jugadores, $baraja, $cartaTriunfo, $ruta);
    foreach ($jugadores as $nombre => $cartas) {
        mostrarCartasJugador($cartas, $nombre, $ruta);
    }
    $baza++;
}












