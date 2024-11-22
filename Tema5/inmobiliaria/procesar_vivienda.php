<?php
// Función para generar el identificador de la vivienda
function generar_identificador_vivienda()
{
    // Obtener la fecha actual
    $fechaActual = date('Ymd'); // Formato: año, mes, día (e.g., 20241110)
    // Leer el último identificador del archivo (si existe)
    $archivoSecuencia = 'secuencia_viviendas.txt';
    $contador = 1;

    if (file_exists($archivoSecuencia)) {
        $ultimoRegistro = file_get_contents($archivoSecuencia);
        $ultimaFecha = substr($ultimoRegistro, 0, 8);
        $ultimoContador = (int)substr($ultimoRegistro, 8);

        // Si es el mismo día, incrementar el contador; si no, reiniciar
        if ($ultimaFecha === $fechaActual) {
            $contador = $ultimoContador + 1;
        }
    }

    // Generar el nuevo identificador
    $identificador = $fechaActual . str_pad($contador, 3, '0', STR_PAD_LEFT);

    // Guardar el nuevo valor en el archivo
    file_put_contents($archivoSecuencia, $identificador);

    return $identificador;
}

// Validar y procesar datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Generar el identificador de vivienda
    $idVivienda = generar_identificador_vivienda();

    $tipo = $_POST['tipo'] ?? '';
    $zona = $_POST['zona'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $dormitorios = (int)($_POST['dormitorios'] ?? 0);
    $precio = (float)($_POST['precio'] ?? 0);
    $tamano = (float)($_POST['tamano'] ?? 0);
    $extras = $_POST['extras'] ?? [];
    $observaciones = $_POST['observaciones'] ?? '';

    // Validar y procesar fotos
    $rutaFotos = [];
    if (isset($_FILES['foto']) && is_array($_FILES['foto']['name'])) {
        $carpetaFotos = 'fotos/';
        if (!file_exists($carpetaFotos)) {
            mkdir($carpetaFotos);
        }

        // Iterar a través de un máximo de 5 fotos
        for ($i = 0; $i < min(5, count($_FILES['foto']['name'])); $i++) {
            if ($_FILES['foto']['size'][$i] > 100 * 1024) {
                echo "La foto " . ($i + 1) . " excede el límite de 100 KB y no se ha subido.<br>";
                continue;
            }

            // Crear el nombre de la foto con el identificador de la vivienda y un sufijo iterativo
            $extension = pathinfo($_FILES['foto']['name'][$i], PATHINFO_EXTENSION);
            $nombreFoto = $idVivienda . str_pad($i + 1, 2, '0', STR_PAD_LEFT) . '.' . $extension;
            $rutaFoto = $carpetaFotos . $nombreFoto;

            if (move_uploaded_file($_FILES['foto']['tmp_name'][$i], $rutaFoto)) {
                $rutaFotos[] = $rutaFoto;
            } else {
                echo "Error al subir la foto " . ($i + 1) . ".<br>";
            }
        }
    } else {
        echo "No se han subido fotos válidas.<br>";
    }


    // Calcular beneficio
    function calcular_beneficio($zona, $tamano, $precio)
    {
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

    if (count($rutaFotos) > 0) {
        echo "Fotos:<br>";
        foreach ($rutaFotos as $foto) {
            echo "<a href='$foto' target='_blank'>$foto</a><br>";
        }
    }

    echo "Beneficio para la empresa: $beneficio €<br>";

    // Guardar en un archivo
    $archivo = fopen('viviendas.txt', 'a');
    fwrite($archivo, "$idVivienda, $tipo, $zona, $direccion, $dormitorios, $precio, $tamano, " . implode(', ', $extras) . ", $observaciones, " . implode(', ', $rutaFotos) . ", $beneficio\n");
    fclose($archivo);
}
?>

<br>
<h3>
    <a href="inmobiliaria.php">Volver al formulario de alta</a>
</h3>