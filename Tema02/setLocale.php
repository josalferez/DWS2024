<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');  // Incluye múltiples opciones
        echo date("d-m-y");  // Formato en español

        

        
        /*
        setlocale(LC_TIME, 'es_ES.UTF-8');
        echo strftime("%A %d de %B de %Y");  // Muestra el día en español, por ejemplo: "martes 03 de octubre de 2024"
        */
    ?>
</body>
</html>