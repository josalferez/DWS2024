<?php
// Nombre de la cookie que almacenará las visitas
$cookie_name = "visitas_pagina";

// Verificar si se solicita borrar las cookies
if (isset($_POST['borrar_cookie'])) {
    setcookie($cookie_name, "", time() - 3600); // Elimina la cookie
    header("Location: " . $_SERVER['PHP_SELF']); // Redirige a la página actual
    exit();
}

// Gestionar las visitas
$max_visitas = 5; // Número máximo de visitas a almacenar
$visitas = [];

// Si la cookie ya existe, recupera las visitas previas
if (isset($_COOKIE[$cookie_name])) {
    $visitas = explode(",", $_COOKIE[$cookie_name]); // Divide la cadena en un array
}

// Agregar la hora actual a las visitas
$visitas[] = date("l, j \d\e F \d\e Y H:i:s");

// Si supera el máximo de visitas, elimina la más antigua
if (count($visitas) > $max_visitas) {
    array_shift($visitas); // Elimina el primer elemento (el más antiguo)
}

// Guardar las visitas actualizadas en una cookie (como cadena delimitada por comas)
setcookie($cookie_name, implode(",", $visitas), time() + 3600); // Expira en 1 hora
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Visitas con Cookies</title>
    <style>
        body {
            background-color: #d3d3d3;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            font-size: 2.5em;
        }
        .container {
            background-color: blue;
            color: white;
            padding: 20px;
            margin: 20px auto;
            width: 60%;
            border-radius: 10px;
        }
        .buttons {
            margin: 20px;
        }
        input {
            padding: 10px 20px;
            margin: 5px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <h1>CONTROL VISITAS PAGINA CON COOKIES</h1>

    <form method="POST" class="buttons">
        <input type="submit" name="borrar_cookie" value="Borrar cookie">
        <input type="submit" name="recargar" value="Recargar página">
    </form>

    <div class="container">
        <p><strong>Usted ha visitado esta página <?php echo count($visitas); ?> veces.</strong></p>
        <p>Las últimas veces que nos visitó fue en:</p>
        <ul>
            <?php
            // Mostrar las visitas en orden inverso (más reciente primero)
            foreach (array_reverse($visitas) as $visita) {
                echo "<li>$visita</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
