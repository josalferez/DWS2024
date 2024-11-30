<?php
class Producto
{
    public const IVA = 0.20; // 20% de IVA
    public const DESCUENTO_MAXIMO = 30; // 30% de descuento permitido

    public function __construct(
        public string $nombre,
        public float $precio,
        public int $stock
    ) {
        if ($precio <= 0) {
            throw new InvalidArgumentException("El precio debe ser mayor a 0.");
        }
        if ($stock < 0) {
            throw new InvalidArgumentException("El stock no puede ser negativo.");
        }
    }

    public function setPrecio(float $precio): void
    {
        if ($precio <= 0) {
            throw new InvalidArgumentException("El precio debe ser mayor a 0.");
        }
        $this->precio = $precio;
    }

    public static function calcularPrecioConIva(float $precio): float
    {
        return $precio * (1 + self::IVA);
    }

    public function aplicarDescuento(int $porcentaje): void
    {
        if ($porcentaje > self::DESCUENTO_MAXIMO) {
            throw new InvalidArgumentException("El descuento no puede exceder el máximo permitido.");
        }
        $this->precio -= ($this->precio * $porcentaje / 100);
    }
}

// Ejemplo de uso
try {
    $producto = new Producto("Laptop", 1000, 10);
    echo "Precio original con IVA: " . Producto::calcularPrecioConIva($producto->precio) . PHP_EOL;

    $producto->aplicarDescuento(20);
    echo "Precio después del descuento: " . $producto->precio . PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
