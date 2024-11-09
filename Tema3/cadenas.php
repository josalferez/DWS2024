<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Factorial Recursivo </title>
</head>
    <body>
        <?php
            function verificarArgumento($argumento) {
                // Verificar si el argumento es una cadena de caracteres
                if (is_string($argumento)) {
                    // Verificar si la cadena está vacía
                    if (empty($argumento)) {
                        return "Este es el relleno porque estaba vacía";
                    } else {
                        // Si no está vacía, devolver la cadena en mayúsculas
                        return strtoupper($argumento);
                    }
                } else {
                    // Si el argumento no es una cadena, devolver el argumento con el mensaje adicional
                    return $argumento . " no es una cadena de caracteres";
                }
            }

            // Ejemplos de uso:
            echo "<br>" . verificarArgumento("");           // Muestra: Este es el relleno porque estaba vacía
            echo "<br>" . verificarArgumento("Hola mundo"); // Muestra: HOLA MUNDO
            echo "<br>" . verificarArgumento(123);          // Muestra: 123 no es una cadena de caracteres
        ?>
    </body>
</html>