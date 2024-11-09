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

foreach ($baraja as $carta) {
    echo $carta['palo'] . " ";
}


 //La barajamos
 shuffle($baraja);

 echo "<br>";
 foreach ($baraja as $carta) {
    echo $carta['palo'] . " ";
}


 //Reparto cartas a los jugadores de una en una
 $jugadores = [];
 for ($i=0; $i < 3; $i++) { 
    $jugadores['Jugador 1'][] = array_pop($baraja);
    $jugadores['Jugador 2'][] = array_pop($baraja);    
}


echo "<br><br> Cartas del jugador";
foreach ($jugadores as $nombre => $jugador) {
    echo "<br> Las cartas de $nombre son: ";
    foreach ($jugador as $carta) {
        echo $carta['palo'].$carta['valor'] . " ";
    }
}

$jugada = [];
$jugada['Jugador 1'] = array_pop($jugadores['Jugador 1']);  
$jugada['Jugador 2'] = array_pop($jugadores['Jugador 2']); 


echo "<br> <br> Cartas de la jugada son: <br>";
foreach ($jugada as $jugador => $carta) {
        echo $jugador . ": " . $carta['palo'].$carta['valor'] . "<br>";
    }










