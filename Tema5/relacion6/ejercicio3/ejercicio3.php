<?php
try {
    echo "<table width=\"50%\" border=\"0\" cellpadding=\"3\">"; // Imprimo los valores tabulados con una tabla con bordes a 0
    $handle = @fopen("matriz.txt", "r"); // TOP!!! Abro la matriz en modo lectura. La @ evita el warning y luego lo manejo con el catch
 //   $handle = @fopen("matriz2.txt", "r"); // Para probar el catch !!
    if ($handle){
        while ($matriz = fscanf($handle, "%s\t%s\t%s\t%s\n")) { // Leo cada columna de la matriz. Un %s \t por columna
            list ($c1, $c2, $c3,$c4) = $matriz; // TOP!!! Con list guardo en c1, c2, c3 y c4 los valores 0, 1, 2 y 3 de cada línea del array $matriz
                echo "<tr >";
                    echo "<td>" . $c1 . "</td>";
                    echo "<td>" . $c2 . "</td>";
                    echo "<td>" . $c3 . "</td>";
                    echo "<td>" . $c4 . "</td>";  
                echo "</tr>";
        }
        fclose($handle);
        echo "</table>";
    } else{
        throw new Exception("Error al abrir el fichero", 1);
    }
} catch (\Throwable $e) {
    echo $e->getMessage();
}
?>