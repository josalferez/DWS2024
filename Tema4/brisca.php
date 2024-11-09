<?php
// Ruta a la carpeta de imágenes
$rutaImagenes = 'imagenesCartas/';

// Inicialización de la baraja y los jugadores
$palos = ["oros", "copas", "espadas", "bastos"];
$valores = range(1, 12); // 1 = As, 10 = Sota, 11 = Caballo, 12 = Rey
$baraja = [];

// Crear baraja completa con imágenes
foreach ($palos as $palo) {
    foreach ($valores as $valor) {
        $baraja[] = ["palo" => $palo, "valor" => $valor];
    }
}

// Mezcla la baraja
shuffle($baraja);

// Reparte 3 cartas a cada jugador
$jugadores = [
    "Jugador 1" => array_splice($baraja, 0, 3),
    "Jugador 2" => array_splice($baraja, 0, 3),
];

//Mostramos las cartas iniciales de los jugadores
foreach ($jugadores as $nombre => $cartas) {
    mostrarCartasJugador($cartas, $nombre, $rutaImagenes);
}

// Seleccionar carta de triunfo
$cartaTriunfo = array_pop($baraja);
echo "Carta en la mesa: ";
mostrarCarta($cartaTriunfo, $rutaImagenes);
echo "<br>";

// Función para mostrar una carta con imagen
function mostrarCarta($carta, $ruta) {
    $archivoImagen = $ruta . $carta['palo'] . '_' . $carta['valor'] . '.jpg';
    echo "<img src='$archivoImagen' alt='{$carta['palo']} {$carta['valor']}' width='80' height='120'>";
}

// Función para mostrar todas las cartas de un jugador
function mostrarCartasJugador($jugador, $nombre, $ruta) {
    echo "$nombre tiene las cartas: ";
    foreach ($jugador as $carta) {
        mostrarCarta($carta, $ruta);
    }
    echo "<br>";
}

// Función para jugar una baza
function jugarBaza(&$jugadores, &$baraja, $cartaTriunfo, $ruta) {
    $cartasJugadas = [];
    foreach ($jugadores as $nombre => &$cartas) {
        $cartaJugada = array_pop($cartas); // Cada jugador juega una carta
        $cartasJugadas[] = ["jugador" => $nombre, "carta" => $cartaJugada];
        echo "$nombre juega: ";
        mostrarCarta($cartaJugada, $ruta);
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

// Simulación de todas las bazas hasta que no queden cartas en la baraja
$baza = 1;
while (!empty($baraja)) {
    echo "<br><strong>Baza $baza</strong><br>";
    jugarBaza($jugadores, $baraja, $cartaTriunfo, $rutaImagenes);
    foreach ($jugadores as $nombre => $cartas) {
        mostrarCartasJugador($cartas, $nombre, $rutaImagenes);
    }
    $baza++;
}

//Le añadimos al jugador que tiene menos cartas la carta de la mesa 
echo count(['Jugador 1']);
echo count(['Jugador 2']); 
