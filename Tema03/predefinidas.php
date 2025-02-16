<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Tema 3</title>
    </head>
    <body>
        <?php
            $cadena = "Hola, mundo. ¿Qué tal estás hoy?";
            
            // Cadena original
            echo "Cadena original: $cadena<br>";

            // Los primeros 12 caracteres
            echo "Los 12 primeros caracteres: " . substr($cadena, 0, 12) . "<br>";

            // Longitud de la cadena
            echo "La longitud de la cadena es: " . strlen($cadena) . "<br>";

            // Posición de la palabra "Mundo" con M mayúscula
            echo "Posición de la palabra 'Mundo' con M mayúscula: " . strpos($cadena, 'Mundo') . "<br>";

            // Posición de la palabra "mundo" con m minúscula
            echo "Posición de la palabra 'mundo' con m minúscula: " . stripos($cadena, 'mundo') . "<br>";

            // Convertir a mayúsculas
            echo "Convertimos a mayúsculas: " . strtoupper($cadena) . "<br>";

            // Convertir a minúsculas
            echo "Convertimos a minúsculas: " . strtolower($cadena) . "<br>";

            // Subcadena a partir del punto (incluido)
            echo "Cadena a partir del punto: " . strstr($cadena, '.') . "<br>";

            // Cadena al revés
            echo "Cadena al revés: " . strrev($cadena) . "<br>";
        ?>

    </body>
</html>