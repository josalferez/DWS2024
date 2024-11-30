<?php

trait Operaciones
{

    // 1. Aumentamos el saldo
    public function depositar($monto)
    {
        if ($monto > 0) {
            $this->saldo += $monto;
        } else {
            throw new InvalidArgumentException("<br> Error: El deposito no puede ser negativo.", 1);
        }
    }

    // 2. Retiramos saldo de la cuenta
    public function retirar($monto)
    {
        if ($monto < $this->saldo) {
            $this->saldo -= $monto;
        } else {
            throw new InvalidArgumentException("<br> Error: No tiene saldo suficiente.", 1);
        }
    }
}

class CuentaBancaria
{
    use Operaciones;
    const MONEDA = 'USD';

    public function __construct(public int $saldo, public int $idCuenta) {}

    public function transferir($monto, CuentaBancaria $otraCuenta)
    {
        $otraCuenta->depositar($monto);
        $this->retirar($monto);
    }

    public function obtenerSaldo()
    {
        return "<br> Saldo de Cuenta {$this->idCuenta}: " . $this->saldo . " " . self::MONEDA;
    }
}

class TarjetaCredito
{
    use Operaciones;
    const LIMITE_MAX = 1500;
    const MONEDA = 'USD';
    public function __construct(public int $saldotarjeta) {}
}

try {
    $cuenta1 = new CuentaBancaria(20,01);
    $cuenta2 = new CuentaBancaria(1500,02);

    // Muestro el saldo en cuenta
    echo $cuenta1->obtenerSaldo();

    //Deposito 10 y muestro el saldo
    $cuenta1->depositar(10);
    echo $cuenta1->obtenerSaldo();

    //Retiro 20 y muestro el saldo
    $cuenta1->retirar(20);
    echo $cuenta1->obtenerSaldo();

    //Hago una transferencia de la cuenta 2 a la cuenta 1. 
    echo $cuenta2->obtenerSaldo();
    $cuenta2->transferir(137, $cuenta1);
    echo "<br><br><strong>Saldos en cuentas despues de la transferencia </strong><br>";
    echo $cuenta1->obtenerSaldo() . $cuenta2->obtenerSaldo();
} catch (\Throwable $e) {
    echo $e->getMessage();
}
