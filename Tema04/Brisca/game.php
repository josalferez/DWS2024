<?php
include("baraja.php");
// Preparamos la baraja.
$baraja = [
    "bastos" => [],
    "copas" => [],
    "espadas" => [],
    "oros" => []
];
// Jugadores del Apartado A y B;
$jugador = [];
$jugadorB = [];

// Barajas
$baraja = crearBaraja($baraja);
$barajaAleatoria = barajarBaraja($baraja);
$barajaApartadoC = barajarBaraja($baraja);


// Apartado A
list($b,$j) = repartirCartas($baraja["bastos"],$jugador,3);
$baraja["bastos"] = $b;
$jugador= $j;


// Apartado B
list($b2,$j2) = repartirCartas($barajaAleatoria,$jugadorB,10);
$barajaAleatoria = $b2;
$jugadorB = $j2;

?>