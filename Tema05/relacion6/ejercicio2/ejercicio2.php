<?php
	try{
        $fich = @fopen("../ejercicio1/fichero_ejemplo.txt", "r"); // La @ para que no lance el warning si falla al abrir el fichero. Así lo manejo yo con la excepción. 
        if ($fich === False){
            throw new Exception("No se encuentra el fichero o no se pudo leer<br>");
        }else{
            while( !feof($fich) ){
                $car = fgetc($fich);			
                echo $car;
            }
        }
        fclose($fich); 
    }catch(Exception $e){
        echo $e->getMessage();
    }

    ?>