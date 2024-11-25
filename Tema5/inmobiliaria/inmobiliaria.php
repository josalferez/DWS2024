<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Alta de Vivienda</title>
</head>

<body>

    <form action="procesar_vivienda.php" method="POST" enctype="multipart/form-data">
        <h1 style="text-align: center;">Formulario de Vivienda</h1>
        <label for="tipo">Tipo de vivienda:</label>
        <select name="tipo" id="tipo">
            <option value="Piso">Piso</option>
            <option value="Adosado">Adosado</option>
            <option value="Chalet">Chalet</option>
            <option value="Casa">Casa</option>
        </select>
        <br> <br>

        <label for="zona">Zona:</label>
        <select name="zona" id="zona">
            <option value="Centro">Centro</option>
            <option value="Zaidín">Zaidín</option>
            <option value="Chana">Chana</option>
            <option value="Albaicín">Albaicín</option>
            <option value="Sacromonte">Sacromonte</option>
            <option value="Realejo">Realejo</option>
        </select>
        <br> <br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required>
        <br>

        <label for="dormitorios">Número de dormitorios:</label>
        <input type="number" name="dormitorios" id="dormitorios" min="1" max="5" required>
        <br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required>
        <br>

        <label for="tamano">Tamaño (m²):</label>
        <input type="number" name="tamano" id="tamano" required>
        <br><br>

        <label>Extras:</label>
        <input type="checkbox" name="extras[]" value="Piscina">Piscina
        <input type="checkbox" name="extras[]" value="Jardín">Jardín
        <input type="checkbox" name="extras[]" value="Garaje">Garaje
        <br>

        <label for="foto">Foto (máx 100MB):
        <input type="file" name="foto" id="foto" accept="image/*"> </label> <!-- accept="image/* Solo permitimos subir imágenes -->
        <br><br>

        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones" id="observaciones"></textarea>
        <br>

        <button>Enviar</button>
    </form>
</body>

</html>