<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisca Española</title>
</head>
    <style>
        h3 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            text-align: center;
        }
        li {
            display: inline;
        }
        li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover {
            background-color: #111;
        }

        #imagen {
            margin-top: 2em;
            text-align: center;
        }
        img {
            width: 50%;
            height: 50%;
        }
    </style>
<?php

?>

<body>    
    <h3>Seleccione una opción:</h3>
    <ul>
        <li><a href="<?=BASE_URL?>index.php?controller=Baraja&action=mostrarBaraja">Mostrar baraja</a></li>
        <li><a href="<?=BASE_URL?>index.php?controller=Baraja&action=mostrarBarajaAleatoria">Barajar el mazo</a></li>
        <li><a href="<?=BASE_URL?>index.php?controller=Carta&action=pedirUltimaCarta">Sacar carta la última carta del mazo</a></li>
        <li><a href="<?=BASE_URL?>index.php?controller=Carta&action=pedirCartaAleatoria">Sacar carta aleatoria del mazo</a></li> 
        <li><a href="<?=BASE_URL?>index.php?controller=Baraja&action=repartirTresCartasAUnJugador">Repartir tres cartas a un jugador</a></li>
        <li><a href="<?=BASE_URL?>index.php?controller=Baraja&action=repartirDiezCartasAUnJugador">Repartir diez cartas a un jugador</a></li>
    </ul>

    <div id="imagen">
        <img src="<?=BASE_URL?>img/BarajaEspanola.png" alt="Baraja de cartas">
    </div>
            

    
</body>

</html>