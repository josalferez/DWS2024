<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tema 4</title>
</head>
<body>
    <form method="GET" action="">
   <!--      <input type="number" id="valor" name="valor">
          <input type="submit" value="Mostrar línea"> -->
    </form>
    <!-- Podemos pasar el valor de la línea usando un método GET así: http://localhost/tulinea.php?valor=500 -->

    <?php
        $arr1 = [2,36,4,52,7,21,5,8];
        //a) Lo muestro
        foreach ($arr1 as $valor){
            echo " $valor";
        }
        //b) lo ordeno y lo muestro
        echo "<br>";
        sort($arr1);
        foreach ($arr1 as $valor){
            echo " $valor";
        }

        $buscar = (int)$_GET['numero'];
        if(in_array($buscar,$arr1)){
            
            echo " <br>  $buscar esta en el array ";
        }
        
    ?>
</body>
</html>
