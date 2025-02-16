<?php

//Creamos una baraja
 $palos = ["oros","copas","bastos","espadas"];
 $valores = range(1,12);
 $baraja = [];

foreach ($palos as $palo)
 foreach ($valores as $valor) {
    $baraja[] = ['palo' => $palo,'valor' => $valor];
 }

 function imprimeBaraja($baraja){
    $ruta = 'imagenesCartas/';
    foreach ($baraja as $key => $carta) {
        $archivoImagen = $ruta . $carta['palo'] . '_' . $carta['valor'] . '.jpg';
        echo "<img src='$archivoImagen' width='80' height='120'>";
    }
 }

 imprimeBaraja($baraja);

 //La barajamos
 shuffle($baraja);

 echo "<br> Baraja barajada";
 imprimeBaraja($baraja);

 //Reparto cartas a los jugadores de una en una
 $jugadores = [];
 for ($i=0; $i < 3; $i++) { 
    $jugadores['Jugador 1'][] = array_pop($baraja);
    $jugadores['Jugador 2'][] = array_pop($baraja);    
}

 echo "<br> Cartas del jugador 1";
 imprimeBaraja($jugadores['Jugador 1']);

 
 echo "<br> Cartas del jugador 2";
 imprimeBaraja($jugadores['Jugador 2']);

echo "<br> Baraja sin las cartas del jugador 1 y del jugador 2";
imprimeBaraja($baraja);
 
//Contamos el valor de la baraja 1= 11 puntos, 3 = 10 puntos, 10 = 2 puntos, 11 = 3 puntos, 12 = 4 puntos
function contamosCartas($baraja){
    $puntos = 0;

    foreach ($baraja as $key => $carta) {
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
    echo "<br> Las cartas de la baraja suman $puntos puntos";
}

contamosCartas($baraja);
contamosCartas($jugadores['Jugador 1']);
contamosCartas($jugadores['Jugador 2']);










