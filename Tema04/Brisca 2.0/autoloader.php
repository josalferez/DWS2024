<?php
// Autoloader para cargar las clases de forma automática
// DEBE ESTAR A LA MISMA ALTURA QUE EL INDEX.PHP.
spl_autoload_register(function ($clase){
    $directorio_clase = str_replace('\\', '/', $clase);
    if(file_exists($directorio_clase . '.php')){
        require_once($directorio_clase . '.php');
    }
})


?>