<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Tema 3</title>
</head>
<body>
 
    <?php 
        function potencia($base, $exponente = 2){     
            
                return pow($base,$exponente);
        }

        $base = 2;
        $exponente = 3;
        
        echo "<br> Llamada con exponente -> $base elevado a $exponente es: " . potencia($base,$exponente);
        echo "<br> Llamada sin exponente -> $base elevado a 2 es: " . potencia($base);

        
    ?>


</body>
</html>