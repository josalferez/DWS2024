<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function duplicarPositivo(float &$numero): float|string
        {
            if ($numero > 0) {
                $resultado = $numero * 2;
                $numero = $resultado;
                return $resultado;
            } else {
                return 'No puedes usar número en negativo o cero';
            }
        }

        $numero = 12.1;
        echo "El doble de " . $numero . " es " . duplicarPositivo($numero) . "<br>";
        echo "El doble de " . $numero . " es " . duplicarPositivo($numero) . "<br>";


        $valor1 = 10;
        $suma= fn($valor2) => $valor1 + $valor2;
        $resta = fn($valor2) => $valor1 - $valor2;
        $multiplicacion = fn($valor2) => $valor1 * $valor2;

        echo "<br> El resultado de sumar es " . $suma(3);
        echo "<br> El resultado de restar es " . $resta(3);
        echo "<br> El resultado de multiplicar es " . $multiplicacion(3);    
    
        
/*
        function operacion_uno($valor2) {
            global $valor1;
            return $valor1 + $valor2;        
        }
        
        function operacion_dos($valor2) {
            global $valor1;
            return $valor1 - $valor2;        
        }
*/
    
        $operacion_uno = fn($valor2) => $valor1 + $valor2;
        $operacion_dos = fn($valor2) => $valor1 - $valor2;

        $numero = "uno";
        $op = "operacion_".$numero;
        echo "<br> Ahora sumo dos números usando Funciones variables: " . $$op(5); // Imprime 12
        
        $op = "";
        $numero = "dos";
        $op = "operacion_".$numero;
        echo "<br> Ahora resto dos números usando Funciones variables: " . $$op(2); // Imprime 8
    
    ?>

    </body>
</html>