<?php

// views/index.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Monedero</title>
</head>
<body>
    <h1>Monedero</h1>
    <nav>
        <a href="index.php?action=index">Inicio</a>
        <a href="index.php?action=agregar">Agregar Registro</a>
        <a href="index.php?action=buscar">Buscar Registro</a>
    </nav>
    <h2>Lista de Registros</h2>
    <table border='1'>
        <tr><th>Fecha</th><th>Concepto</th><th>Importe</th><th>Acciones</th></tr>
        <?php foreach ($registros as $indice => $registro): ?>
            <tr>
                <td><?= $registro['fecha'] ?></td>
                <td><?= $registro['concepto'] ?></td>
                <td><?= $registro['importe'] ?></td>
                <td>
                    <form method='post' action='index.php?action=borrar' style='display:inline;'>
                        <input type='hidden' name='indice' value='<?= $indice ?>'>
                        <button type='submit'>Borrar</button>
                    </form>
                    <a href="index.php?action=editar&indice=<?= $indice ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Agregar Registro</h2>
    <form method='post' action='index.php?action=agregar'>
        <input type='text' name='fecha' placeholder='d/m/aaaa' required>
        <input type='text' name='concepto' placeholder='Concepto' required>
        <input type='text' name='importe' placeholder='Importe'>
        <button type='submit'>Añadir</button>
    </form>
</body>
</html>
