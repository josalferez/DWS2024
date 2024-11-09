<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
</head>
    <body>
        <form method="POST" action=" ">
            <label> INTRODUCE LA MATRÍCULA: </label>
            <input type="text" id="matricula" name="matricula">
            <input type="submit" value="enviar">
        </form>

        <?php
            function comprobarMatricula($matricula) {
                // Expresión regular para verificar el formato: 4 números (0000-9999) seguidos de 3 letras (AAA-ZZZ)
                $patron = '/^[0-9]{4}[A-Z]{3}$/';
                // Comprobar si la matrícula cumple con el patrón
                if (preg_match($patron, $matricula)) {
                    return "La matrícula $matricula es válida.";
                } else {
                    return "La matrícula $matricula no es válida.";
                }
            }
            
            if (!empty($_POST['matricula'])){
                $mat = htmlspecialchars($_POST['matricula']);
                echo comprobarMatricula($mat);
            }    
        ?>

    </body>
</html>