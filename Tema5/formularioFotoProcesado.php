<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>
<a href="formularioFoto.php">Volver al formulario de alta</a>
</h3>

    <h2>Fichero recibido:</h2>
    Nombre: <?= $_FILES[ "foto" ][ "name" ]."<br>"?>
    Tamaño: <?= $_FILES[ "foto" ][ "size" ]." bytes"."<br>"?>
    Temporal: <?= $_FILES[ "foto" ][ "tmp_name" ]."<br>"?>
    Tipo: <?= $_FILES[ "foto" ][ "type" ]."<br>"?>
    Error: <?= $_FILES[ "foto" ][ "error" ]."<br>"?>

    <?php
    // comprobando y moviendo a un directorio
    if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
        $nombreDirectorio = "img/";
        $nombreFichero = $_FILES["foto"]["name"];

        // Si no existe el directorio lo creo
        if (!file_exists($nombreDirectorio)) {
            mkdir($nombreDirectorio);
        }
        
        $nombreCompleto = $nombreDirectorio . $nombreFichero;
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $nombreFichero;
        }

        move_uploaded_file($_FILES["foto"]["tmp_name"], $nombreDirectorio . $nombreFichero);
    } else {
        print("No se ha podido subir el fichero\n");
    }
    ?>


</body>
</html>
