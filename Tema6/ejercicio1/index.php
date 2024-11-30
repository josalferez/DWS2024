<?php
require_once 'coche.php';

$coche1 = new Coche("Rojo", "Ferrari", "Aventador", 300, 500, 2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> DATOS DEL COCHE </h1>
    <?php echo $coche1 ?>
    <h1> Cambiamos el color del coche y lo ponemos amarillo</h1>
    <?php $coche1->setColor("amarillo");
    echo $coche1;
    ?>
    <h1> Creamos un nuevo coche su color será verde y el modelo gallardo</h1>
    <h1> Datos del nuevo Coche</h1>
    <?php 
    $coche2 = new Coche(color:"verde",modelo:"gallardo");
    echo $coche2; ?>
</body>
</html>