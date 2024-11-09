<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Tema 3</title>
    </head>
    <body>
         <form method="POST" action=" ">
            <label> Vamos a duplicar una cadena: </label>
            <input type="text" id="cadena" name="cadena">
            <input type="submit" value="enviar">
        </form>
        <?php
            function duplicarCaracteres($cadena) {
                $resultado = '';
                // Recorremos cada carácter de la cadena
                for ($i = 0; $i < strlen($cadena); $i++) {
                    // Duplicamos el carácter y lo agregamos al resultado
                    $resultado .= $cadena[$i] . $cadena[$i];
                }
                return $resultado;
            }

            if (!empty($_POST['cadena'])){
                // Ejemplo de uso
                $cadenaOriginal = $_POST['cadena'];
                echo "Cadena original: $cadenaOriginal<br>";
                echo "Cadena duplicada: " . duplicarCaracteres($cadenaOriginal);
            }    
        ?>
    </body>
</html>