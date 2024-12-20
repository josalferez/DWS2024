<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Document</title>

</head>
<body>
    <style>
.button2 {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px #999;
}

.button2:hover {
    background-color: #3e8e41
}

.button2:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}
</style>
    <div style="text-align: center; position: absolute; top: 20%; left: 50%; transform: translate(-50%, -50%);">
        <a href="añadirUsuario.php" class="button2">Añadir Usuario</a>
        <a href="listarUsuarios.php" class="button2">Listar Usuarios</a>
    </div>
</body>
</html>

