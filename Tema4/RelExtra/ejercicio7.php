<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Generar un array de números distintos entre 100 y 999
$filas = 6;
$columnas = 9;
$numeros = range(100, 999);
shuffle($numeros); // Mezcla aleatoria de los números
$matriz = array();

// Llenar el array bidimensional con los primeros 54 números aleatorios únicos
$contador = 0;
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        $matriz[$i][$j] = $numeros[$contador++];
    }
}

// Encontrar el mínimo y su posición
$minimo = 999;
$posMinimo = array('fila' => -1, 'columna' => -1);
for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        if ($matriz[$i][$j] < $minimo) {
            $minimo = $matriz[$i][$j];
            $posMinimo = array('fila' => $i, 'columna' => $j);
        }
    }
}

// Mostrar la matriz con el formato solicitado
echo '<table border="1" cellpadding="5">';
for ($i = 0; $i < $filas; $i++) {
    echo '<tr>';
    for ($j = 0; $j < $columnas; $j++) {
        $color = "black"; // Color predeterminado
        if ($matriz[$i][$j] == $minimo) {
            $color = "blue"; // El mínimo en azul
        } elseif (abs($i - $posMinimo['fila']) == abs($j - $posMinimo['columna'])) {
            // Chequear si el número está en alguna de las dos diagonales del mínimo
            $color = "green";
        }
        echo '<td style="background-color:' . $color . ';">' . $matriz[$i][$j] . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>

</body>
</html>
