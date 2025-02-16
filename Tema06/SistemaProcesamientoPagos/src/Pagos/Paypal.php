<?php 
namespace App\Pagos;

use App\Interfaces\PagoInterface;

class Paypal implements PagoInterface{
    public function procesarPago(float $cantidad): string
    {
        return "Pago de $cantidad procesado con PayPal.";
    }
}