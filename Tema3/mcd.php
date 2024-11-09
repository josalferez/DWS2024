<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
</head>
    <body>
        <?php
            function mcd($a, $b) {
                // Aseguramos que ambos números sean enteros positivos
                if ($a < 0 || $b < 0) {
                    return "Los números deben ser enteros positivos.";
                }
                
                // Aplicamos el algoritmo de Euclides
                while ($b != 0) {
                    $temp = $b;
                    $b = $a % $b; // Resto de a dividido por b
                    $a = $temp; // Asignamos el valor de b a a
                }
                return $a; // Cuando b es 0, a contiene el MCD
            }

            // Definimos dos números para probar
            $num1 = 150;
            $num2 = 39;

            // Llamamos a la función y mostramos el resultado
            $resultado = mcd($num1, $num2);
            echo "El máximo común divisor de $num1 y $num2 es: $resultado"; // Debería mostrar 6
        ?>
    </body>
</html>