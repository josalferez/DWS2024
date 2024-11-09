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
imprimeBaraja([$cartaTriunfo]);

 
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















