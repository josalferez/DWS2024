<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Tema 3</title>
    </head>
    <body>
    
        <?php 
            function factorial($valor){ 
                //Lanzamos una excepción si valor es menor que 0
                if ($valor < 0){
                    throw new InvalidArgumentException("El numero no puede ser negativo");       
                }   

                if ($valor <= 1)
                    return 1;
                else{       
                    echo "<br> $valor "; 
                    return $valor * factorial($valor - 1);
                }  
            }
            try{
                $valor = -4;
                echo "<br> El factorial de $valor es: " . factorial($valor);
            }catch(InvalidArgumentException $e){
                echo "Error: " . $e->getMessage();
            }
        ?>
    </body>
</html>