<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
</head>
<body>
    <?php
        setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');  // Incluye múltiples opciones
        
        //Usamos DateTime porque strftime está "deprecated" pero se puede usar. 
        $fecha = new DateTime('now');
        echo "<br> La fecha de hoy es: " . $fecha->format('l, d \d\e F \d\e Y');


        // Formatear la fecha en el formato requerido
        echo "<br>" . strftime("%A, %d de %B de %Y", $fecha->getTimestamp());
    ?>
</body>
</html>