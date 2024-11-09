<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
</head>
<body>
    <h1>Calculadora Básica</h1>
    
    <form method="GET" action="">
        <label for="num1">Primer número: </label>
        <input type="text" id="num1" name="num1"><br><br>

        <label for="num2">Segundo número: </label>
        <input type="text" id="num2" name="num2"><br><br>

        <label for="operacion">Operación: </label>
        <select id="operacion" name="operacion">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacion'])) {
            $num1 = (float)$_GET['num1'];
            $num2 = (float)$_GET['num2'];
            $operacion = $_GET['operacion'];
            $resultado = "";

            switch ($operacion) {
                case "suma":
                    $resultado = $num1 + $num2;
                    break;
                case "resta":
                    $resultado = $num1 - $num2;
                    break;
                case "multiplicacion":
                    $resultado = $num1 * $num2;
                    break;
                case "division":
                    if ($num2 != 0) {
                        $resultado = $num1 / $num2;
                    } else {
                        $resultado = "Error: División por cero";
                    }
                    break;
                default:
                    $resultado = "Operación no válida";
                    break;
            }

            echo "<h2>Resultado: $resultado</h2>";
        }
    ?>
</body>
</html>
