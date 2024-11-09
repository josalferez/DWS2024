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
    foreach ($baraja as $key => $valor) {
        $archivoImagen = $ruta . $valor['palo'] . '_' . $valor['valor'] . '.jpg';
        echo "<img src='$archivoImagen' width='80' height='120'>";
    }
 }

 imprimeBaraja($baraja);

 //La barajamos
 shuffle($baraja);

 echo "<br> Baraja barajada";
 imprimeBaraja($baraja);

 $jugadores = [
    "Jugador 1" => array_splice($baraja,0,3),
    "Jugador 2" => array_splice($baraja,0,3),
 ];

 echo "<br> Cartas del jugador 1";
 imprimeBaraja($jugadores['Jugador 1']);

 
 echo "<br> Cartas del jugador 2";
 imprimeBaraja($jugadores['Jugador 2']);

echo "<br> Baraja sin las cartas del jugador 1 y del jugador 2";
imprimeBaraja($baraja);
 









