<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('DBHOST', $_ENV['DBHOST']);
define('DBUSER', $_ENV['DBUSER']);
define('DBPASS', $_ENV['DBPASS']);
define('DBNAME', $_ENV['DBNAME']);
?>