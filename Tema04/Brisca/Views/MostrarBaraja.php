<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Carta</title>
</head>
<style>
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
    <h1>Mostrar Baraja</h1>
    <div class="baraja">
        <?php foreach ($mazo as $carta): ?>
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
</body>
</html>