<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
</head>
    <body>
        <form method="POST" action=" ">
            <label> INTRODUCE EL DNI: </label>
            <input type="text" id="dni" name="dni">
            <input type="submit" value="enviar">
        </form>

        <?php
            function comprobarDNI($dni) {
                // Expresión regular para verificar el formato: 8 números (0000-9999) seguidos de 1 letra (A-Z)
                $patron = '/^[0-9]{8}[A-Z]{1}$/';   
                //Convertimos DNI a mayúscula
                $dni = strtoupper($dni);
                // Comprobar si el dni cumple con el patrón
                if (preg_match($patron, $dni)) {
                    return "El $dni es válido.";
                } else {
                    return "El $dni no es válido.";
                }
            }
            
            if (!empty($_POST['dni'])){
                $dni = htmlspecialchars($_POST['dni']);
                echo comprobarDNI($dni);
            }    
        ?>

    </body>
</html>