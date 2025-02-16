<?php 

//require_once __DIR__ . "/vendor/autoload.php";
require_once 'src/Interfaces/PagoInterfaces.php';
require_once 'src/Pagos/Paypal.php';
require_once 'src/Pagos/TarjetaCredito.php';
require_once 'src/Pagos/TransferenciaBancaria.php';

use App\Pagos\Paypal;
use App\Pagos\TarjetaCredito;
use App\Pagos\TransferenciaBancaria;

$tarjeja = new TarjetaCredito();
$paypal = new Paypal();
$transferencia = new TransferenciaBancaria();

echo $tarjeja->procesarPago(150,75) . "<br>";
echo $paypal->procesarPago(200,25) . "<br>";
echo $transferencia->procesarPago(300,50) . "<br>";

