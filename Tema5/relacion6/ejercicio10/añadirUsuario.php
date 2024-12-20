<?php 
/** Ejercicio: "Gestión de Contactos"
* Descripción:
* Crea un programa en PHP que permita gestionar una lista de contactos. Cada contacto debe tener los siguientes datos:

* Nombre
* Apellido
* Email
* Teléfono
* El programa debe permitir al usuario realizar las siguientes acciones:

* Añadir un nuevo contacto.
* Listar todos los contactos.
* Guardar los contactos en un fichero.
* Cargar los contactos desde un fichero.
*/ 
include 'metodos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !formularioVacio()){
    echo "<div style='position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%);'>";
    guardarContacto($_POST["nombre"], $_POST["apellido"], $_POST["email"]);
    echo "</div>";
}else{
?>
<link rel="stylesheet" href="../../css/estilos.css">
<div style="position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%);">
 <form method="POST" action="">
    Nombre: <input type="text" name="nombre" id="nombre"><br>
    Apellido: <input type="text" name="apellido" id="apellido"><br>
    Email: <input type="text" name="email" id="email"><br>
    <button>Enviar</button>
 </form>
</div>
<?php } ?>