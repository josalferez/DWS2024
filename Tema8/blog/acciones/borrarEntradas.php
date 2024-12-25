<?php
session_start();
require_once '../requires/conexion.php';

// Validar que el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

// Obtener el ID de la entrada
$entrada_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Borrar la entrada
$sql = "DELETE FROM entradas WHERE id = :id AND usuario_id = :usuario_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $entrada_id, PDO::PARAM_INT);
$stmt->bindParam(':usuario_id', $_SESSION['usuario']['id'], PDO::PARAM_INT);

if ($stmt->execute() && $stmt->rowCount() > 0) {
    header("Location: listarEntradas.php");
    exit;
} else {
    die("Error: No se pudo borrar la entrada o no tienes permisos.");
}
?>
