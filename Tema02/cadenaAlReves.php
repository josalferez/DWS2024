<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Cadena al Revés </title>
</head>
<body>
    <!--interfaz para pedir la cadena-->
    <form method="GET" action="">
        <label for="cadena">Introduzca una palabra</label>
        <input type="text" id="palabra" name="palabra">
        <input type="submit" value="Voltear Cadena">
    </form>

    <?php 
        if (isset($_GET['palabra']) && !empty($_GET['palabra'])){
            $palabra = htmlspecialchars($_GET['palabra']);
            $palabraVolteada = '';

            for ($i = strlen($palabra) -1; $i>=0; $i--){
                $palabraVolteada .= $palabra[$i];
            }
            echo "La cadena original es: " . $palabra . ".";
            echo "<br>";
            echo "La cadena volteada es: " . $palabraVolteada . ".";
        }        
    ?>

</body>
</html>