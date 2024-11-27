<?php
// Clase base
class BaseCalc
{
    public function __construct(
        protected float $num1,
        protected float $num2
    ) {}

    public function calculate(): string
    {
        return "Número 1: {$this->num1}, Número 2: {$this->num2}";
    }
}

// Clase para suma
class AddCalc extends BaseCalc
{
    public function calculate(): string
    {
        $result = $this->num1 + $this->num2;
        return "La suma de {$this->num1} y {$this->num2} es: {$result}";
    }
}

// Clase para resta
class SubCalc extends BaseCalc
{
    public function calculate(): string
    {
        $result = $this->num1 - $this->num2;
        return "La resta de {$this->num1} y {$this->num2} es: {$result}";
    }
}

// Clase para multiplicación
class MulCalc extends BaseCalc
{
    public function calculate(): string
    {
        $result = $this->num1 * $this->num2;
        return "La multiplicación de {$this->num1} y {$this->num2} es: {$result}";
    }
}

// Clase para división
class DivCalc extends BaseCalc
{
    public function calculate(): string
    {
        if ($this->num2 == 0) {
            return "Error: División entre cero no permitida.";
        }
        $result = $this->num1 / $this->num2;
        return "La división de {$this->num1} entre {$this->num2} es: {$result}";
    }
}

// Uso de las clases
$num1 = 10;
$num2 = 5;

$add = new AddCalc($num1, $num2);
$sub = new SubCalc($num1, $num2);
$mul = new MulCalc($num1, $num2);
$div = new DivCalc($num1, $num2);

echo $add->calculate() . PHP_EOL;
echo $sub->calculate() . PHP_EOL;
echo $mul->calculate() . PHP_EOL;
echo $div->calculate() . PHP_EOL;

// Ejemplo de división por cero
$num3 = 0;
$divError = new DivCalc($num1, $num3);
echo $divError->calculate() . PHP_EOL;
?>
