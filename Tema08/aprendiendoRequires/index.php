<?php
// Añado el fichero de configuración
require_once 'requires/config.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/assets/css/estilo.css">
</head>

<body>
    <p class="highlight">HOLA MUNDO</p>

    <?php
    echo "<br>Desde index.php valor de basepatch: " . BASE_PATH;
    ?>
</body>

</html>