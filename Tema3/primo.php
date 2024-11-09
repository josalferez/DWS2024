<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
</head>
    <body>
        <form method="POST" action="">   
            <label for="menu"> Introduce un numero: </label>
            <input type="text" id="numero" name="numero"> 
            <input type="submit" value="calcular">  
        </form> 
        <?php
            function esPrimo($num) {
                // Los números menores o iguales a 1 no son primos
                if ($num <= 1) {
                    return false;
                }

                // Verificar divisibilidad desde 2 hasta la raíz cuadrada del número
                for ($i = 2; $i <= sqrt($num); $i++) {
                    if ($num % $i == 0) {
                        return false; // No es primo si es divisible por algún número
                    }
                }
                return true; // Es primo si no es divisible por ningún número
            }

            $max = (int)htmlspecialchars($_POST['numero']);
            $primosEncontrados = 0;

            for ($x = 1; $x <= $max; $x++) {
                if (esPrimo($x)) {
                    $primosEncontrados++;
                    echo "$x, ";
                }
            }

            echo "<br> Total de números primos encontrados entre 1 y " . $max . ": " . $primosEncontrados;
        ?>
    </body>
</html>