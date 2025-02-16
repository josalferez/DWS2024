<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
        
        //Calculo la fecha de hoy. Es un String
        $fechaHoy = date('d,m,y');

        //Muestro la fecha de hoy
        echo "<br>la fecha de hoy es: ". $fechaHoy;

        //Muestro la fecha de ayer
        $fechaAyer = strtotime('-1day',time());
        $fechaAyer = date('d,m,y', $fechaAyer);
        echo "<br>la fecha de ayer fue: ". $fechaAyer;
        
        //Muestro la fecha de mañana
        $fechaMañana = strtotime('+1day',time());
        $fechaMañana = date('d,m,y', $fechaMañana); 
        echo "<br>la fecha de mañana será: ". $fechaMañana;
                
    ?>
</body>
</html>