<?php
// Nos aseguramos de que la sesión esté iniciada
session_start();

echo "Te has registrado";
echo "<br>";
echo "<br>";

echo "post <br>";
var_dump($_POST);
echo "<br>";
echo "Login Exito";

echo " sesion<br>";
var_dump($_SESSION);

echo "<br>LoginExito vale: " . $_SESSION['loginExito'];

echo "<br> <br>      <a href='./index.php'>Volver al index</a>";


?>