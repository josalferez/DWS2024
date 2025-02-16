<?php
// Definición de variables y mensajes de error
$name = $surname = $email = $phone = $employment = $url = "";
$languages = [];
$nameErr = $surnameErr = $emailErr = $phoneErr = $employmentErr = $languagesErr = $urlErr = "";

// Lista de valores válidos
$validEmployment = ["sin empleo", "media jornada", "tiempo completo"];
$validLanguages = ["Python", "PHP", "JavaScript", "Java", "C++"];

// Procesamiento de la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación del nombre
    if (empty($_POST["name"])) {
        $nameErr = "El nombre es obligatorio.";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]*$/", $name)) {
            $nameErr = "El nombre solo debe contener letras y espacios.";
        }
    }

    // Validación de los apellidos
    if (empty($_POST["surname"])) {
        $surnameErr = "Los apellidos son obligatorios.";
    } else {
        $surname = test_input($_POST["surname"]);
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]*$/", $surname)) {
            $surnameErr = "Los apellidos solo deben contener letras y espacios.";
        }
    }

    // Validación del correo electrónico
    if (empty($_POST["email"])) {
        $emailErr = "El correo es obligatorio.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "El formato del correo es inválido.";
        }
    }

    // Validación del teléfono
    if (empty($_POST["phone"])) {
        $phoneErr = "El teléfono es obligatorio.";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{9}$/", $phone)) {
            $phoneErr = "El teléfono debe contener exactamente 9 dígitos.";
        }
    }

    // Validación del empleo actual
    if (empty($_POST["employment"])) {
        $employmentErr = "El empleo actual es obligatorio.";
    } else {
        $employment = test_input($_POST["employment"]);
        if (!in_array($employment, $validEmployment)) {
            $employmentErr = "El valor del empleo es inválido.";
        }
    }

    // Validación de los lenguajes
    if (empty($_POST["languages"])) {
        $languagesErr = "Debe seleccionar al menos un lenguaje.";
    } else {
        $languages = $_POST["languages"];
        foreach ($languages as $lang) {
            if (!in_array($lang, $validLanguages)) {
                $languagesErr = "Uno o más lenguajes seleccionados son inválidos.";
                break;
            }
        }
    }

    // Validación de la URL
    if (empty($_POST["url"])) {
        $urlErr = "La URL es obligatoria.";
    } else {
        $url = test_input($_POST["url"]);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $urlErr = "El formato de la URL es inválido.";
        }
    }

    // Mostrar datos si no hay errores
    if (empty($nameErr) && empty($surnameErr) && empty($emailErr) && empty($phoneErr) && empty($employmentErr) && empty($languagesErr) && empty($urlErr)) {
        echo "<h2>Datos válidos ingresados:</h2>";
        echo "<p>Nombre: $name</p>";
        echo "<p>Apellidos: $surname</p>";
        echo "<p>Correo: $email</p>";
        echo "<p>Teléfono: $phone</p>";
        echo "<p>Empleo actual: $employment</p>";
        echo "<p>Lenguajes que domina: " . implode(", ", $languages) . "</p>";
        echo "<p>URL del trabajo: <a href=\"$url\">$url</a></p>";
    }
}

// Función para limpiar y procesar datos
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data); // Elimina las barras invertidas
    $data = htmlspecialchars($data); // Convierte caracteres especiales en entidades HTML
    return $data;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Empleo</title>
    <link rel="stylesheet" href="../../css/estilos.css">
</head>
<body>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Formulario de Empleo</h2>
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <span style="color:red"><?php echo $nameErr; ?></span><br><br>

        <label for="surname">Apellidos:</label><br>
        <input type="text" id="surname" name="surname" value="<?php echo $surname; ?>">
        <span style="color:red"><?php echo $surnameErr; ?></span><br><br>

        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
        <span style="color:red"><?php echo $emailErr; ?></span><br><br>

        <label for="phone">Teléfono:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>">
        <span style="color:red"><?php echo $phoneErr; ?></span><br><br>

        <p>Empleo actual:</p>
        <input type="radio" id="sin_empleo" name="employment" value="sin empleo" <?php if ($employment === "sin empleo") echo "checked"; ?>> <!-- Al recargar la página si no pongo este if, entoncentes el radio button se marcaría vacío-->
        <label for="sin_empleo">Sin empleo</label><br>
        <input type="radio" id="media_jornada" name="employment" value="media jornada" <?php if ($employment === "media jornada") echo "checked"; ?>>
        <label for="media_jornada">Media jornada</label><br>
        <input type="radio" id="tiempo_completo" name="employment" value="tiempo completo" <?php if ($employment === "tiempo completo") echo "checked"; ?>>
        <label for="tiempo_completo">Tiempo completo</label>
        <span style="color:red"><?php echo $employmentErr; ?></span><br><br>

        <p>Lenguajes que domina:</p>
        <?php foreach ($validLanguages as $lang): ?>
            <input type="checkbox" id="<?php echo $lang; ?>" name="languages[]" value="<?php echo $lang; ?>" <?php if (in_array($lang, $languages)) echo "checked"; ?>>
            <label for="<?php echo $lang; ?>"><?php echo $lang; ?></label><br>
        <?php endforeach; ?>
        <span style="color:red"><?php echo $languagesErr; ?></span><br><br>

        <label for="url">URL de tu último trabajo:</label><br>
        <input type="text" id="url" name="url" value="<?php echo $url; ?>">
        <span style="color:red"><?php echo $urlErr; ?></span><br><br>

        <button>Enviar</button>
    </form>
</body>
</html>
