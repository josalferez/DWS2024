<?php
function calcular_beneficio($zona, $tamano, $precio) {
    $porcentajes = [
        "Centro" => $tamano > 100 ? 0.35 : 0.30,
        "Zaidín" => $tamano > 100 ? 0.28 : 0.25,
        "Chana" => $tamano > 100 ? 0.25 : 0.22,
        "Albaicín" => $tamano > 100 ? 0.35 : 0.20,
        "Sacromonte" => $tamano > 100 ? 0.25 : 0.22,
        "Realejo" => $tamano > 100 ? 0.28 : 0.25
    ];
    return $precio * $porcentajes[$zona];
}

// Validar y procesar datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Generar un ID único para la vivienda
    $idVivienda = uniqid('vivienda_');
    $idVivienda2 = date("Ymd");
    echo $idVivienda2 . "";

    $tipo = $_POST['tipo'] ?? '';
    $zona = $_POST['zona'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $dormitorios = (int)($_POST['dormitorios'] ?? 0);
    $precio = (float)($_POST['precio'] ?? 0);
    $tamano = (float)($_POST['tamano'] ?? 0);
    $extras = $_POST['extras'] ?? [];
    $observaciones = $_POST['observaciones'] ?? '';

    // Validar tamaño de la foto
    $rutaFoto = "No se subió ninguna foto.";
    if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {
        if ($_FILES['foto']['size'] > 1000 * 1024) {
            die("El tamaño de la foto excede el límite de 100 MB.");
        }
        $carpetaFotos = 'fotos/';
        if (!file_exists($carpetaFotos)) {
            mkdir($carpetaFotos);
        }
        // Añadir el ID único al nombre de la imagen
        $nombreFoto = $idVivienda . '_' . basename($_FILES['foto']['name']);
        $rutaFoto = $carpetaFotos . $nombreFoto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $rutaFoto);
    }

    // Calcular beneficio
    $beneficio = calcular_beneficio($zona, $tamano, $precio);

    // Mostrar información
    echo "<h2>Datos de la Vivienda</h2>";
    echo "ID Vivienda: $idVivienda<br>";
    echo "Tipo: $tipo<br>";
    echo "Zona: $zona<br>";
    echo "Dirección: $direccion<br>";
    echo "Dormitorios: $dormitorios<br>";
    echo "Precio: $precio €<br>";
    echo "Tamaño: $tamano m²<br>";
    echo "Extras: " . implode(', ', $extras) . "<br>";
    echo "Observaciones: $observaciones<br>";
    echo "Foto: <a href='$rutaFoto' target='_blank'>Ver Foto</a><br>";
    echo "Beneficio para la empresa: $beneficio €<br>";

    // Guardar en un archivo
    $archivo = fopen('viviendas.txt', 'a');
    fwrite($archivo, "$idVivienda, $tipo, $zona, $direccion, $dormitorios, $precio, $tamano, " . implode(', ', $extras) . ", $observaciones, $rutaFoto, $beneficio\n");
    fclose($archivo);
}
?>


<br>
<h3>
<a href="inmobiliaria.php">Volver al formulario de alta</a>
</h3>
