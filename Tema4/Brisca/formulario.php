<?php
include("game.php");
// Comprobar que el número que me pasan no sea 0 o null;
$numJugadores = $_POST["num_jugador"];
if($numJugadores==0 || $numJugadores==null) {
    echo "No se puede jugar con 0 jugadores";
    die();
}

echo "<h1>Apartado C</h1>";
// Apartado C
$jugadoresTotales = [];
for($i=0;$i<$numJugadores;$i++){
    array_push($jugadoresTotales,[]);
}

// Repartimos 3 cartas a cada jugador de uno en uno.
for($j=0;$j<3;$j++){
    for($y=0;$y<count($jugadoresTotales);$y++){
    list($b3,$j3) = repartirCartas($barajaApartadoC,$jugadoresTotales[$y],1);
    $barajaApartadoC = $b3;
    $jugadoresTotales[$y] = $j3;
}
}

// Enseñamos la cartas de cada jugador.
$contador = 0;
foreach($jugadoresTotales as $jugador){
    echo "<h3>Jugador ". ($contador+1) . "<br></h3>";
    $puntosPorJugador = 0;
    // Calculamos la puntuación de cada jugador.
    foreach($jugador as $carta){
        $puntosPorJugador+= $carta["puntuacion"];
    }
    echo "<b>Puntuacion: $puntosPorJugador </b>";
    echo "<br>";

    foreach($jugador as $carta){
        echo "<img src='" . $carta["imagen"] . "' alt=''>";
    
    }
    $contador++;
    echo "<br><br>";
}

// Enseñamos el resto de las cartas.
echo "<h3>Cartas de la baraja</h3>";
foreach($barajaApartadoC as $carta){
    echo "<img src='" . $carta["imagen"] . "' alt=''>";
}
?>