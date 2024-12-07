<?php

// Trait Operaciones
trait Operaciones
{
    public $saldo = 0;

    // Método para depositar
    public function depositar($monto)
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("El monto debe ser positivo.");
        }
        $this->saldo += $monto;
    }

    // Método para retirar
    public function retirar($monto)
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("El monto debe ser positivo.");
        }
        if ($this->saldo < $monto) {
            throw new Exception("Saldo insuficiente.");
        }
        $this->saldo -= $monto;
    }
}

// Clase CuentaBancaria
class CuentaBancaria
{
    use Operaciones;

    const MONEDA = 'USD';

    private $titular;

    public function __construct($titular)
    {
        $this->titular = $titular;
    }

    public function transferir($monto, CuentaBancaria $otraCuenta)
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("El monto debe ser positivo.");
        }
        $this->retirar($monto);
        $otraCuenta->depositar($monto);
    }

    public function obtenerSaldo()
    {
        return $this->saldo . " " . self::MONEDA;
    }
}

// Clase TarjetaCredito
class TarjetaCredito
{
    use Operaciones;

    const MONEDA = 'USD';
    private $limiteCredito;

    public function __construct($limiteCredito)
    {
        $this->limiteCredito = $limiteCredito;
    }

    // Sobrescribir método retirar para incluir la lógica de límite de crédito
    public function retirar($monto)
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("El monto debe ser positivo.");
        }
        if ($this->saldo - $monto < -$this->limiteCredito) {
            throw new Exception("Límite de crédito excedido.");
        }
        $this->saldo -= $monto;
    }

    public function obtenerSaldo()
    {
        return $this->saldo . " " . self::MONEDA;
    }
}

// Ejemplo de uso
try {
    // Crear cuentas
    $cuenta1 = new CuentaBancaria("Juan");
    $cuenta2 = new CuentaBancaria("Ana");

    // Depositar en cuentas
    $cuenta1->depositar(500);
    echo "Saldo Cuenta 1: " . $cuenta1->obtenerSaldo() . "<br>";

    $cuenta2->depositar(300);
    echo "Saldo Cuenta 2: " . $cuenta2->obtenerSaldo() . "<br>";

    // Transferir entre cuentas
    $cuenta1->transferir(145, $cuenta2);
    echo "<pre>";
    echo "Saldo después de transferencia:" . "<br>";
    echo "Saldo Cuenta 1: " . $cuenta1->obtenerSaldo() . "<br>";
    echo "Saldo Cuenta 2: " . $cuenta2->obtenerSaldo() . "<br>";
    echo "</pre>";

    // Crear tarjeta de crédito
    $tarjeta = new TarjetaCredito(1000); // Límite de crédito de 1000
    $tarjeta->depositar(100);
    echo "Saldo Tarjeta: " . $tarjeta->obtenerSaldo() . "<br>";

    // Intentar retirar más del límite
    $tarjeta->retirar(1101); // Excede el límite de crédito
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}
