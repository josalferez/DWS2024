<?php
// 1. Leer el contenido del fichero empleados.xml
$xmlFile = 'empleados.xml';
$xsdFile = 'departamentos.xsd';

// Cargar el XML
$xml = new DOMDocument();
$xml->load($xmlFile);

// 2. Seleccionar un elemento con XPath
$xpath = new DOMXPath($xml);

// Ejemplo: Seleccionar todos los nombres de empleados
$empleados = $xpath->query('//empleado/nombre');
echo "Nombres de los empleados:<br>\n";
foreach ($empleados as $empleado) {
    echo "- " . $empleado->nodeValue . "<br> \n";
}

// 3. Validar el fichero empleados.xml con departamentos.xsd
if ($xml->schemaValidate($xsdFile)) {
    echo "\nEl fichero XML es válido según el esquema XSD.\n";
} else {
    echo "\nEl fichero XML no es válido según el esquema XSD.\n";
}
?>
