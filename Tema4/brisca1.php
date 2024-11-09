<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Cartas</title>
    <style>
        /* Estilos de CSS que dividirán la página */
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        /* Contenedor del juego a la izquierda */
        .game-container {
            width: 70%;
            padding: 20px;
            overflow-y: auto;
        }
        /* Contenedor de los puntos a la derecha */
        .score-container {
            width: 30%;
            padding: 20px;
            background-color: #f5f5f5;
            border-left: 2px solid #ccc;
        }
        /* Coloca la puntuación arriba */
        .score-header {
            font-weight: bold;
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="game-container">
    <!-- Aquí va el código del juego -->
    <?php
    echo "<h2>Juego de Cartas</h2>";

    // Ruta a la carpeta de imágenes
    $rutaImagenes = 'imagenesCartas/';
    
    // Inicialización de la baraja y los jugadores
    $palos = ["oros", "copas", "espadas", "bastos"];
    $valores = range(1, 12); // 1 = As, 10 = Sota, 11 = Caballo, 12 = Rey
    $baraja = [];
    $puntosJugador1 = 0;
    $puntosJugador2 = 0;
    $puntos_temp = 0;
    
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
    
    //Función para contar los puntos de las cartas
    function contamosCartas($baraja,&$puntos){
        // Si $cartas es una sola carta, no es un array de arrays (baraja), la convertimos en un array
        if (isset($baraja['palo'])) {
            $baraja = [$baraja]; // Convierte la carta única en un array de una carta
        }
        foreach ($baraja as $carta) {
            switch($carta['valor']){
                case 1: $puntos += 11; break;
                case 3: $puntos += 10; break;
                case 10: $puntos += 2; break;
                case 11: $puntos += 3; break;                
                case 12: $puntos += 4; break;
            }
        }
    }
    
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
    function jugarBaza(&$jugadores, &$baraja, $cartaTriunfo, $ruta, &$puntosJugador1,&$puntosJugador2) {
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

        // Contamos los puntos de la jugada y se los añadimos al jugador correspondiente. 
        $puntos_temp = 0;
        foreach ($cartasJugadas as $jugada) {
            contamosCartas($jugada['carta'],$puntos_temp);
        }
        if ($ganador['jugador'] == 'Jugador 1'){
                $puntosJugador1 += $puntos_temp;
        }else{
            $puntosJugador2 += $puntos_temp;
        }


        echo "<br>";
    
        // Robamos cartas
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
        jugarBaza($jugadores, $baraja, $cartaTriunfo, $rutaImagenes, $puntosJugador1,$puntosJugador2);
        foreach ($jugadores as $nombre => $cartas) {
            mostrarCartasJugador($cartas, $nombre, $rutaImagenes);
        }
        $baza++;
    }
    
    //Le añadimos al jugador 2 la carta triunfo 
    echo "<br> <br>";
    $jugadores['Jugador 2'][2] = $cartaTriunfo;
    foreach ($jugadores as $nombre => $cartas) {
        mostrarCartasJugador($cartas, $nombre, $rutaImagenes);
    }
    
    //Juego las 3 últimas bazas y muestro las cartas 
    for ($i=0; $i < 3; $i++) { 
        echo "<br><strong>Baza $baza</strong><br>";
        jugarBaza($jugadores, $baraja, $cartaTriunfo,$rutaImagenes,$puntosJugador1,$puntosJugador2);
        foreach ($jugadores as $nombre => $cartas) {
            mostrarCartasJugador($cartas, $nombre, $rutaImagenes);
        }
        $baza++;
    }
    
    ?>
</div>

<div class="score-container">
    <!-- Aquí mostramos los puntos -->
    <div class="score-header">Puntuación</div>
    <?php
    // Código PHP para mostrar los puntos de los jugadores
    echo "Jugador 1: {$puntosJugador1} puntos.<br>";
    echo "Jugador 2: {$puntosJugador2} puntos.<br>";
    ?>
</div>

</body>
</html>
