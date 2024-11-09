<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Alumno</title>
</head>
<body>
    <h1>Ejercicio inicial</h1>
    <p>Crea un formulario con el siguientes aspecto:</p>
    <h2>Alta alumno:</h2>

    <form method="post" action="alumnoAñadido.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos"><br><br>

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo"><br><br>

        <label>¿Qué lenguajes de programación conoces?</label><br>
        <input type="checkbox" id="c++" name="lenguajes[]" value="C++">
        <label for="c++">C++</label>
        <input type="checkbox" id="javascript" name="lenguajes[]" value="JavaScript">
        <label for="javascript">JavaScript</label>
        <input type="checkbox" id="php" name="lenguajes[]" value="PHP">
        <label for="php">PHP</label>
        <input type="checkbox" id="python" name="lenguajes[]" value="Python">
        <label for="python">Python</label><br><br>

        <label>¿Sabes crear páginas web estáticas?</label><br>
        <input type="radio" id="si" name="sabe_web" value="Si">
        <label for="si">Si</label>
        <input type="radio" id="no" name="sabe_web" value="No">
        <label for="no">No</label><br><br>

        <label for="comentarios">Comentarios:</label><br>
        <textarea id="comentarios" name="comentarios" rows="4" cols="50"></textarea><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"><br><br>

        <label for="repite_contrasena">Repita la contraseña:</label>
        <input type="password" id="repite_contrasena" name="repite_contrasena"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
