<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function concatena($titulo, ...$palabras){
        $resultado = "$titulo <br>";
        foreach($palabras as $palabra){
            $resultado .= $palabra." ";  // Concatenación de cada palabra con un espacio
        }
        return $resultado;
    }

    echo concatena("Ciclo Formativo:", "Desarrollo", "de", "Aplicaciones", "Web <br><br>");
    echo concatena("Módulo:", "DWES");
    echo concatena('1','12','34','78','324');
    ?>

</body>
</html>