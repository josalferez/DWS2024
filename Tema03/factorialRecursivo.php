<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Tema 3</title>
</head>
<body>
 
    <?php 
        function factorial($valor){     
            if ($valor <= 1)
                return 1;
            else{       
                echo "<br> $valor "; 
                return $valor * factorial($valor - 1);
            }  
        }
        $valor = 5;
        echo "<br> El factorial de 5 es: " . factorial($valor);
        
    ?>


</body>
</html>