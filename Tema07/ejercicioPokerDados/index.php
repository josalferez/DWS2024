<?php
session_start();

class Dado {
    private $figuras = ["AS", "K", "Q", "J", "Roja", "Negra"];
    private $cara;

    // Método para tirar el dado
    public function tira() {
        $this->cara = $this->figuras[random_int(0, count($this->figuras) - 1)];
    }

    // Método para obtener el nombre de la figura de la última tirada
    public function nombreFigura() {
        return $this->cara;
    }
}

// Inicializar las variables de sesión y cookies
if (!isset($_SESSION['tiradas'])) {
    $_SESSION['tiradas'] = 0;
}

if (!isset($_COOKIE['ultima_mano'])) {
    setcookie('ultima_mano', '', time() + 3600);
}

// Lógica del juego
$dados = [];
$resultado = [];
$mensaje = "";

if (isset($_POST['tirar'])) {
    $_SESSION['tiradas']++;

    // Crear y tirar los 5 dados
    for ($i = 0; $i < 5; $i++) {
        $dado = new Dado();
        $dado->tira();
        $dados[] = $dado;
        $resultado[] = $dado->nombreFigura();
    }

    // Guardar la última mano en una cookie
    setcookie('ultima_mano', json_encode($resultado), time() + 3600);
    $mensaje = "Tirada realizada. Puedes volver a tirar o quedarte con tu mano.";
}

if (isset($_POST['quedarse'])) {
    $ultimaMano = isset($_COOKIE['ultima_mano']) ? json_decode($_COOKIE['ultima_mano'], true) : [];
    $mensaje = "Te has quedado con la siguiente mano: " . implode(", ", $ultimaMano);
    session_destroy(); // Finaliza el juego
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Póker Dados</title>
</head>
<body>
    <h1>Póker Dados</h1>

    <p>Número de tiradas realizadas: <?php echo $_SESSION['tiradas']; ?></p>

    <?php if (!empty($resultado)): ?>
        <p>Resultados de la última tirada: <?php echo implode(", ", $resultado); ?></p>
    <?php endif; ?>

    <form method="POST">
        <button type="submit" name="tirar">Tirar dados</button>
        <?php if ($_SESSION['tiradas'] > 0): ?>
            <button type="submit" name="quedarse">Quedarse con la mano</button>
        <?php endif; ?>
    </form>

    <p><?php echo $mensaje; ?></p>
</body>
</html>
