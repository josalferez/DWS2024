<?php
// autoload.php

spl_autoload_register(function ($clase) {
    // Convertir el namespace en una ruta de archivo
    // Reemplaza las barras invertidas (\) por barras normales (/)
    $archivo = __DIR__ . '/' . str_replace('\\', '/', $clase) . '.php';

    // Verificar si el archivo existe
    if (file_exists($archivo)) {
        require $archivo;
    } else {
        // Si el archivo no existe, lanzar una excepción o mostrar un error
        die("Error: No se pudo cargar la clase $clase. Archivo no encontrado: $archivo");
    }
});