<?php

include 'metodos.php';

$fichero = "contactos.txt";
$ficheroAbierto = fopen($fichero, "r");
echo "<div style='position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%);'>";
echo "<a href='index.php' class='button3'> Volver </a>";
while (!feof($ficheroAbierto)) {
    $linea = fgets($ficheroAbierto);
    $contacto = explode(";", $linea);
    if (count($contacto) == 3) {
        echo "<p><strong>Nombre:</strong> {$contacto[0]} <strong>Apellido:</strong> {$contacto[1]} <strong>Email:</strong> {$contacto[2]}</p>";
        echo "<hr>";
    }
}
echo "</div>";
fclose($ficheroAbierto);
