<?php

define('BASE_PATH','http://localhost/DWS2024/Tema8/blog/'); // Ruta base del proyecto
echo "BasePath definida en config.php ¡Revisa esto!: " . BASE_PATH . '<br>';

require_once BASE_PATH . 'requires/conexion.php';
require_once BASE_PATH . 'requires/funciones.php';
require_once BASE_PATH . 'acciones/conseguirCategorias.php';
require_once BASE_PATH . 'acciones/conseguirUltimasEntradas.php';

?>
