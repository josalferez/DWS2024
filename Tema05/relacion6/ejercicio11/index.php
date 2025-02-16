
<?php
// Ruta del archivo XML
$xmlFile = '../ejercicio9/empleados.xml';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codEmple = $_POST['codEmple'];
    $telefono = $_POST['telefono'];
    $codigoPostal = $_POST['codigoPostal'];

    // Cargar el XML
    $xml = new DOMDocument();
    $xml->formatOutput = true;
    $xml->load($xmlFile);

    // Buscar el empleado con el código especificado
    $xpath = new DOMXPath($xml);
    $empleado = $xpath->query("//empleado[@codEmple='$codEmple']")->item(0);

    if ($empleado) {
        // Añadir o actualizar el elemento <telefono>
        $telefonoElement = $empleado->getElementsByTagName('telefono')->item(0);
        if (!$telefonoElement) {
            $telefonoElement = $xml->createElement('telefono');
            $empleado->appendChild($telefonoElement);
        }
        $telefonoElement->nodeValue = $telefono;

        // Añadir o actualizar el elemento <codigoPostal>
        $codigoPostalElement = $empleado->getElementsByTagName('codigoPostal')->item(0);
        if (!$codigoPostalElement) {
            $codigoPostalElement = $xml->createElement('codigoPostal');
            $empleado->appendChild($codigoPostalElement);
        }
        $codigoPostalElement->nodeValue = $codigoPostal;

        // Guardar los cambios en el archivo XML
        $xml->save($xmlFile);

        echo "Información actualizada correctamente para el empleado con código $codEmple.";
    } else {
        echo "Empleado con código $codEmple no encontrado.";
    }
} 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar empleados</title>
</head>
<body>
    <h1>Actualizar información de empleados</h1>
    <form action="" method="post">
        <label for="codEmple">Código del Empleado:</label>
        <input type="text" id="codEmple" name="codEmple" required><br><br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>
        
        <label for="codigoPostal">Código Postal:</label>
        <input type="text" id="codigoPostal" name="codigoPostal" required><br><br>
        
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>