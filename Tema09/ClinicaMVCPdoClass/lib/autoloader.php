<?php
// lib/autoloader.php

spl_autoload_register(function ($class) {
    // Convertir el namespace en una ruta de archivo
    $class = str_replace('\\', '/', $class);
    $file = __DIR__ . '/../' . $class . '.php';

    // Verificar si el archivo existe y cargarlo
    if (file_exists($file)) {
        require_once $file;
    }
});