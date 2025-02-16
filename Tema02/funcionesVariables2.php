<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concatenar Palabras</title>
</head>
<body>
    <!-- Formulario para enviar las palabras -->
    <form method="POST" action="">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Escribe un título" required><br><br>

        <label for="palabras">Palabras (separadas por comas):</label>
        <input type="text" id="palabras" name="palabras" placeholder="Escribe las palabras" required><br><br>

        <input type="submit" value="Concatenar">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoger el título y las palabras del formulario
            $titulo = htmlspecialchars($_POST['titulo']);
            $palabrasInput = htmlspecialchars($_POST['palabras']);

            // Separar las palabras usando coma como delimitador
            $palabrasArray = explode(',', $palabrasInput);

            // Función que concatena el título y las palabras
            function concatena($titulo, ...$palabras) {
                $resultado = "$titulo <br>";
                foreach ($palabras as $palabra) {
                    $resultado .= $palabra . " ";  // Concatenar las palabras con un espacio
                }
                return $resultado;
            }

            // Llamada a la función pasando las palabras ingresadas
            echo concatena($titulo, ...$palabrasArray);
        }
    ?>
</body>
</html>
