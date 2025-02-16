<?php
namespace App\Pagos;

use App\Interfaces\PagoInterface;

class TarjetaCredito implements PagoInterface {
    public function procesarPago(float $cantidad): string
    {
        return "Pago de $cantidad procesado con tarjeta de crédido.";
    }
}