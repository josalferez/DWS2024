<?php
namespace App\Interfaces;

interface PagoInterface {
    public function procesarPago(float $cantidad): string;
}