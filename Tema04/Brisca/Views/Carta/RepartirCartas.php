<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
    .jugador {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .baraja {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

    }
    .carta {
        margin: 10px;
        padding: 10px;
        border: 1px solid black;
        border-radius: 10px;
        text-align: center;
    }
    img {
        width: 100px;
        height: 150px;
    }
    p {
        font-size: 20px;
    }
</style>

<body>
<h1>Cartas del Jugador</h1>
    <div class="jugador">
        <?php foreach ($cartasJugador as $carta): ?>
            <?php
                $numero = $carta->getNumero();
                $palo = strtolower($carta->getPalo()); 
                $imagen = "img/{$palo}_{$numero}.jpg";
            ?>
            <div class="carta">
                <img src="<?php echo $imagen; ?>" alt="<?php echo ucfirst($palo) . ' ' . $numero; ?>">
                <p><?php echo ucfirst($palo) . ' ' . $numero; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <h1>Mazo Restante</h1>
    <div class="baraja">
        <?php foreach ($mazoRestante as $carta): ?>
            <?php
                $numero = $carta->getNumero();
                $palo = strtolower($carta->getPalo()); 
                $imagen = "img/{$palo}_{$numero}.jpg"; 
            ?>
            <div class="carta">
                <img src="<?php echo $imagen; ?>" alt="<?php echo ucfirst($palo) . ' ' . $numero; ?>">
                <p><?php echo ucfirst($palo) . ' ' . $numero; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    ?>

</body>

</html>