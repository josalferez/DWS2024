<?php

use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('DBHOST', $_ENV['DBHOST']);        // Nombre del servidor de bases de datos 
define('DBUSER', $_ENV['DBUSER']);         // Usuario para ese servidor
define('DBPASS', $_ENV['DBPASS']);      // Contraseña para ese servidor
define('DBNAME', $_ENV['DBNAME']);   // Nombre de la base de datos