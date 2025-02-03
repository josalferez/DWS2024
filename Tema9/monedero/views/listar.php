// views/listar.php

<!DOCTYPE html>
<html>
<head>
    <title>Monedero</title>
</head>
<body>
    <h1>Monedero</h1>
    <form method='get' action='/buscar'>
        <input type='text' name='concepto' placeholder='Buscar concepto'>
        <button type='submit'>Buscar</button>
    </form>
    <table border='1'>
        <tr><th>Fecha</th><th>Concepto</th><th>Importe</th><th>Acciones</th></tr>
        <?php foreach ($registros as $indice => $registro): ?>
            <tr>
                <td><?= $registro['fecha'] ?></td>
                <td><?= $registro['concepto'] ?></td>
                <td><?= $registro['importe'] ?></td>
                <td>
                    <form method='post' action='/borrar' style='display:inline;'>
                        <input type='hidden' name='indice' value='<?= $indice ?>'>
                        <button type='submit'>Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
