<?php
$directorio = 'mi_carpeta';

// Crear el directorio si no existe
if (!is_dir($directorio)) {
    mkdir($directorio, 0755, true); // true, nos va a permitir crear directorios anidados
}

// Manejo de la subida de archivos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $archivo_subido = $directorio . '/' . basename($_FILES['archivo']['name']); // Si el nombre del archivo es /ruta/al/archivo/mi_imagen.jpg, basename() retornará mi_imagen.jpg.
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo_subido)) {
        echo "El archivo se ha subido correctamente.";
    } else {
        echo "Error al subir el archivo.";
    }
}

// Listar archivos en el directorio
if ($handle = opendir($directorio)) {
    echo "<br> Archivos en el directorio '$directorio':<br>";
    while (false !== ($entry = readdir($handle))) {  //readdir($handle) lee la siguiente entrada del directorio $handle y la asigna a $entry. Esto será un archivo o subdirectorio. Si llega al final devuelve false
        if ($entry != "." && $entry != "..") {  // Comprobamos que la entrada actual no es el directorio actual ni el padre
            echo $entry . "<br>";
        }
    }
    closedir($handle); // Hay que cerrar los directorios una vez usados. Es una buena práctica y hace el código más legible. 
} else {
    echo "<br> El directorio: '$directorio' está vacío. <br>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
    Selecciona un archivo para subir:
    <input type="file" name="archivo" required>
    <input type="submit" value="Subir archivo">
</form>

