<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Tema 3</title>
</head>
    <body>
    
        <?php
        // Función para sumar dos números
        function sumar($num1, $num2) {
            return $num1 + $num2;
        }

        // Función para restar dos números
        function restar($num1, $num2) {
            return $num1 - $num2;
        }

        // Función para multiplicar dos números
        function multiplicar($num1, $num2) {
            return $num1 * $num2;
        }

        // Función para dividir dos números
        function dividir($num1, $num2) {
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Error: División por cero";
            }
        }

        // Función que recibe dos números y el nombre de la operación a realizar
        function calculador($num1, $num2, $operacion) {
            switch ($operacion) {
                case 'sumar':
                    return sumar($num1, $num2);
                case 'restar':
                    return restar($num1, $num2);
                case 'multiplicar':
                    return multiplicar($num1, $num2);
                case 'dividir':
                    return dividir($num1, $num2);
                default:
                    return "Operación no válida";
            }
        }

        // Verificamos que los valores de los números y la operación estén presentes
        if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacion'])) {
            // Convertimos los parámetros a números
            $num1 = filter_var($_GET['num1'], FILTER_VALIDATE_FLOAT);
            $num2 = filter_var($_GET['num2'], FILTER_VALIDATE_FLOAT);
            $operacion = filter_var($_GET['operacion'], FILTER_SANITIZE_STRING);
            
            // Verificamos que los valores sean números válidos
            if ($num1 !== false && $num2 !== false) {
                // Llamamos a la función calculador con los parámetros
                $resultado = calculador($num1, $num2, $operacion);
                echo "El resultado de la operación es: $resultado";
            } else {
                echo "Error: Los valores proporcionados no son números válidos.";
            }
        } else {
            echo "Error: Faltan parámetros en la URL.";
        }              
        ?>
    </body>
</html>