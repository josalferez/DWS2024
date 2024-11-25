<?php
$directorio = 'images';

// Crear el directorio si no existe
if (!is_dir($directorio)) {
    mkdir($directorio, 0755, true);
}

// Manejo de la subida de imágenes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
    $nombreArchivo = basename($_FILES['imagen']['name']);
    $rutaDestino = $directorio . '/' . $nombreArchivo;

    // Comprobar si el archivo es una imagen
    $tipoArchivo = pathinfo($rutaDestino, PATHINFO_EXTENSION);
    $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array(strtolower($tipoArchivo), $tiposPermitidos)) {
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            echo "La imagen se ha subido correctamente.<br>";
        } else {
            echo "Error al subir la imagen.<br>";
        }
    } else {
        echo "Solo se permiten archivos de imagen (jpg, jpeg, png, gif).<br>";
    }
}

// Mostrar las imágenes en el directorio
if ($handle = opendir($directorio)) {
    echo "<br> Imágenes en el directorio '$directorio':<br>";
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<img src='$directorio/$entry' alt='$entry' style='width:100px; height:auto; margin:5px;'><br>";
        }
    }
    closedir($handle);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    Selecciona una imagen para subir:
    <input type="file" name="imagen" accept="image/*" required>
    <input type="submit" value="Subir imagen">
</form>