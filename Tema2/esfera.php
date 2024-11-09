<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hola Mundo en PHP</title>
    </head>
    <body>   

        <form method="POST" action="">
            <label for="menu">¿Cual es el radio de la esfera </label>
            <input type="text" id="radio" name="radio">
            <input type="submit" value="Calcular">
        </form>
        
        <?php
            $radio = 1;

            function CalculaLongitud($radio){       
                $longitud=0;
                $radio;
                $longitud = pow($radio,2)*pi();
                $longitud = round($longitud, 2); 
                echo "La longitud de una circunferencia con radio " .$radio . " es: " . $longitud; 
            }
        
            function CalculaVolumen($radio){
                $volumen=0;
                $radio;
                $volumen = (4/3*pi())*pow($radio,3);
                $volumen = round($volumen,2);
                echo "El volumen de una esfera con radio " . $radio . " es: " . $volumen; 
            }
        
            function CalculaSuperficie($radio){
                $radio;
                $superficie=0;
                $superficie = 4*pi()*pow($radio,2);
                $superficie = round($superficie, 2);     
                echo "El área de una esfera con radio " .$radio . " es: " . $superficie;     
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['radio']) && !empty($_POST['radio'])) {
                $radio  = (int)htmlspecialchars($_POST['radio']);
                CalculaLongitud($radio);
                echo "<br>";
                CalculaVolumen($radio);
                echo "<br>";
                CalculaSuperficie($radio);
                echo "<br>";
            }
        ?>
    </body>
</html>
