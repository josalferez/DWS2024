<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Briscas</title>
</head>
<body>
    <?php
    include("game.php");
    ?>
    <h1>Apartado a</h1>
    <h3>Cartas del usuario</h3>
    <?php
    foreach($jugador as $carta){
        echo "<img src='" . $carta["imagen"] . "' alt=''>";
    }
    echo "<br><br>";

    echo "<h3>Cartas de la baraja</h3>";
    foreach($baraja as $clave => $valor){
        foreach($baraja[$clave] as $carta){
        echo "<img src='" . $carta["imagen"] . "' alt=''>";
        
    }
    }
 ?>
    <h1>Apartado B</h1>
    <?php
        echo "<h3>Cartas del jugador</h3>";
        $puntosTotales = 0;
        foreach($jugadorB as $carta){
            echo "<img src='" . $carta["imagen"] . "' alt=''>";
            $puntosTotales += $carta["puntuacion"];
        }
        echo "<br>";
        echo "La puntuación total de las 10 cartas es: <b>$puntosTotales</b>";
        echo "<br><br>";
    
        echo "<h3>Cartas de la baraja</h3>";
        foreach($barajaAleatoria as $carta){
            echo "<img src='" . $carta["imagen"] . "' alt=''>";
        }
    ?>

    <h1>Apartado C</h1>
    <form action="formulario.php" method="POST">
        
        <input type="number" min="2" max="6" name="num_jugador" id="nombre"  placeholder="Número de jugadores" style="width: 150px;">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>