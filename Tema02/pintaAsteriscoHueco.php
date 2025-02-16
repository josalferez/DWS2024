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
        $numeroHuecos = 1;

        
        //Primera Línea Especial
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

        //Pinto el resto de líneas
        for ($numeroBarras= $numeroBarras-1;$numeroBarras>=0;$numeroHuecos+=2,$numeroBarras--){
            for ($i=0;$i<$numeroBarras;$i++){
                echo "_";
            }
            for ($j=0;$j<$numeroAsteriscos;$j++){
                echo "*";
            }
            //Cambio los huecos por x para que se vea simetrico
            for ($j=0;$j<$numeroHuecos;$j++){
                echo 'x';
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