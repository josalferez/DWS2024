<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Animales al Azar</title>
</head>
<body>
    <?php
    // Función para generar un grupo de animales aleatorios
    function generarGrupoAnimales($min, $max) {
        // Número aleatorio entre 20 y 30 para el tamaño del array
        $numAnimales = rand($min, $max);
        $animales = [];

        // Generamos los animales (Unicode del 128000 al 128060)
        for ($i = 0; $i < $numAnimales; $i++) {
            $animalUnicode = rand(128000, 128060);  // Unicode aleatorio
            $animales[] = '&#' . $animalUnicode . ';';  // Convertimos a HTML entities
        }
        return $animales;
    }

    // Función para eliminar un animal al azar del grupo
    function eliminarAnimal(&$animales) {
        $indiceAnimalAleatorio = array_rand($animales);  // Selecciona un índice aleatorio
        $animalSuelto = $animales[$indiceAnimalAleatorio];  // Animal a eliminar
        unset($animales[$indiceAnimalAleatorio]);  // Elimina el animal del array
        return $animalSuelto;
    }

    // Mostrar grupo inicial de animales
    $grupoAnimales = generarGrupoAnimales(20, 30);
    echo "<h3>Grupo inicial de animales:  ". count($grupoAnimales) . "</h3>";
    echo implode(" ", $grupoAnimales);

    // Eliminar un animal al azar del grupo
    $animalSuelto = eliminarAnimal($grupoAnimales);
    echo "<h3>Animal suelto:</h3>";
    echo $animalSuelto;

    // Mostrar grupo después de eliminar el animal suelto
    echo "<h3>Grupo de animales después de eliminar el suelto:</h3>";
    echo implode(" ", $grupoAnimales);

    // Mostrar número total de animales restantes
    echo "<h3>Total de animales restantes: " . count($grupoAnimales) . "</h3>";
    ?>
</body>
</html>
