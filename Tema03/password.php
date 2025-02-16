<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
</head>
    <body>
        <form method="POST" action="">
            <label> INTRODUCE EL password: </label>
            <input type="text" id="password" name="password">
            <input type="submit" value="enviar">
        </form>

        <?php
            function validarPassword($password) {
                $longitud = strlen($password);

                // Comprobaciones de la contraseña
                if ($longitud < 6 || $longitud > 15) {
                    return "La contraseña debe tener entre 6 y 15 caracteres.";
                }
                if (!preg_match('/\d/', $password)) {
                    return "La contraseña debe contener al menos un número.";
                }
                if (!preg_match('/[A-Z]/', $password)) {
                    return "La contraseña debe contener al menos una letra mayúscula.";
                }
                if (!preg_match('/[a-z]/', $password)) {
                    return "La contraseña debe contener al menos una letra minúscula.";
                }
                if (!preg_match('/\W/', $password)) { // \W busca cualquier carácter que no sea alfanumérico
                    return "La contraseña debe contener al menos un carácter no alfanumérico.";
                }

                // Si pasa todas las validaciones
                return "La contraseña es válida.";
            };         
            
            if (!empty($_POST['password'])){
                $password = htmlspecialchars($_POST['password']);
                echo validarPassword($password);
            }   
            
        ?>
    </body>
</html>
