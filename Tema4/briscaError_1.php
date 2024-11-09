<?php
$palos = ["oros","copas","bastos","espadas"];
 $valores = range(1,12);
 $baraja = [];

foreach ($palos as $palo)
 foreach ($valores as $valor) {
    $baraja[] = [$palo,$valor];
 }

 function imprimeBaraja($baraja){
    $ruta = 'imagenesCartas/';
    foreach ($baraja as $key => $valor) {
        $archivoImagen = $ruta . $valor['palo'] . '_' . $valor['valor'] . '.jpg';
        echo "<img src='$archivoImagen' width='80' height='120'>";
    }
 }

 imprimeBaraja($baraja);










