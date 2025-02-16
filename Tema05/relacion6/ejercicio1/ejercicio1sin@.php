<?php
	try{
        $fich = fopen("fichero_ejemplo.txt", "r");
        if ($fich === False){
            throw new Exception("El fichero no existe");
            
        }else{
            echo "fichero_ejemplo.txt se abrió con éxito<br>";
        }
        $fich = fopen("fichero_no_existe.txt", "r");
        if ($fich === False){
            throw new Exception("El fichero no existe");
        }else{
            echo " fichero_no_existe.txt se abrió con éxito<br>";
        } 
        fclose($fich);
    }catch(Exception $e){
        echo $e->getMessage();
    }

    ?>