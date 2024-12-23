<?php
$host = 'localhost';
$dbname = 'mibasededatos';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "¡Conexión exitosa con MariaDB!";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}


$query = $pdo->query("SELECT * FROM usuarios");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
</tr>";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['nombre']}</td>
    <td>{$row['email']}</td>
    </tr>";
}

echo "</table>";

?>