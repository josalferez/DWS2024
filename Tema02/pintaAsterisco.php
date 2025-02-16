<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Cadena al Revés </title>
</head>
<body>
 
    <?php 
        $numeroBarras = 4;
        $numeroAsteriscos = 1;

        
        for ($numeroAsteriscos;$numeroAsteriscos<9;$numeroAsteriscos+=2,$numeroBarras--){
            for ($i=0;$i<$numeroBarras;$i++){
                echo "_";
            }
            for ($j=0;$j<$numeroAsteriscos;$j++){
                echo "*";
            }
            for ($i=0;$i<$numeroBarras;$i++){
                echo "_";
            }
            //Salto a la siguiente fila
            echo "<br>";
        }
    ?>


</body>
</html>