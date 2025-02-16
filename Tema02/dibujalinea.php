<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Línea SVG</title>
</head>
<body>
    <form method="GET" action="">
        <label for="longitud">Introduce la longitud de la línea (10 a 1000 px): </label>
        <input type="number" id="longitud" name="longitud" min="10" max="1000" value="100">
        <input type="submit" value="Mostrar línea">
    </form>
    <!-- Podemos pasar el valor de la línea usando un método GET así: http://localhost/tulinea.php?longitud=500 -->

    <?php
        if (isset($_GET['longitud'])) {
            $longitud = (int)$_GET['longitud'];
            
            // Validamos que la longitud esté entre 10 y 1000
            if ($longitud < 10) {
                $longitud = 10;
            } elseif ($longitud > 1000) {
                $longitud = 1000;
            }

            // Mostramos el SVG con la línea de la longitud especificada
            print '<svg height="100" width="' . $longitud . '">';
            print '<line x1="0" y1="50" x2="' . $longitud . '" y2="50" style="stroke:rgb(0,0,0);stroke-width:5" />'; //La linea empieza en el punto (0,50) y llega hasta el ($longitud,50)
            print '</svg>'; //Es negra, rgb(0,0,0) y de ancho 2
        }
    ?>
</body>
</html>
