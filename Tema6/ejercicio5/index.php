<?php

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

} catch (\Throwable $e) {
    echo $e->getMessage();
}
