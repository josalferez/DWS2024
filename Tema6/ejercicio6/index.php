<?php

<<<<<<< HEAD
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
=======
class Producto
{

    //Creo el constructor
    const IVA = 0.20;
    const DESCUENTO_MAXIMO = 30;

    // 1. Inicializo instancias de mi clase
    public function __construct(public string $nombre, public float $precio, public int $stock)
    {
        $this->setPrecio($precio); // Valido que el precio sea más que 0
    }

    // 2. Asigno el precio a un producto de mi clase. 
    public function setPrecio($precio)
    {
        if ($precio > 0) {
            $this->precio = $precio;
        } else {
            throw new Exception("Error: El Precio debe ser mayor que 0", 1);
        }
    }

    // 3. Calculo el precio con IVA
    public static function calcularPrecioConIva(float $precio)
    {
        if ($precio > 0) {
            return $precio + ($precio * self::IVA);
        } else {
            throw new Exception("El precio debe ser mayor a 0 para calcular el IVA.");
        }
    }

    // 4.Obtengo el precio de un producto.
    public function getPrecio()
    {
        return $this->precio;
    }

    // 5. Muestro un producto
    public function mostrarInformacion()
    {
        return  "<br>Nombre: " . $this->nombre .
            "<br>Precio: " . $this->precio .
            "<br>Stock: " . $this->stock;
    }

    // 6. Muestro Información
    public function __toString()
    {
        return $this->mostrarInformacion();
    }

    // 7. Aplico un descuento
    public function aplicarDescuento($porcentaje) {
        if ($porcentaje < self::DESCUENTO_MAXIMO) {
            $precioSinDescuento = $this->getprecio();
            $precioConDescuento = $precioSinDescuento - ($precioSinDescuento * $porcentaje / 100);
            
            return $this->setPrecio($precioConDescuento);

        } else{
            throw new Exception("Error: El descuento no puede ser superior al 30%", 1);
            
        }
    }
}

try {
    $p = new Producto("Producto 1", 50, 10);
    echo $p;
    $descuento = 20;
    $p->aplicarDescuento($descuento);
    echo "<br>Aplicamos un descuento del {$descuento}% <br>";
    $precioConIva = Producto::calcularPrecioConIva($p->getPrecio());
    echo "<br>Precio con IVA(" . Producto::IVA*100 . "%): " . number_format($precioConIva, 2) . "<br>";

>>>>>>> 36ef7fdd9352e40fdcdaabbc6a4c5e08a213a5c7
} catch (\Throwable $e) {
    echo $e->getMessage();
}
