<?php
/*
define('DBHOST', 'localhost');        // Nombre del servidor de bases de datos 
define('DBUSER', 'root');         // Usuario para ese servidor
define('DBPASS', '');      // Contraseña para ese servidor
define('DBNAME', 'biblioteca');   // Nombre de la base de datos
*/

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('DBHOST', $_ENV['DBHOST']);
define('DBUSER', $_ENV['DBUSER']);
define('DBPASS', $_ENV['DBPASS']);
define('DBNAME', $_ENV['DBNAME']);
?>