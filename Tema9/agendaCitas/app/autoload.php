<?php

function autoload($class) {
    // Convertir el namespace en una ruta relativa
    $base_dir = dirname(__DIR__) . '/'; // Directorio base de la aplicación
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';

    

    // Verificar si el archivo existe antes de incluirlo
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "El archivo $file no existe.";
    }

}

// Registrar el autoloader
spl_autoload_register('autoload');