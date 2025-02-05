<?php
// VISTA PARA LA LISTA DE LIBROS
// views/libro/all.php

// Recuperamos la lista de libros
$listaLibros = $data["listaLibros"];

// Si hay algún mensaje de feedback, lo mostramos
if (isset($data["info"])) {
  echo "<div style='color:blue'>".$data["info"]."</div>";
}

if (isset($data["error"])) {
  echo "<div style='color:red'>".$data["error"]."</div>";
}

// Vamos a meter el formulario de búsqueda de libros en un fichero buscar.php dentro de
// /views/libro. Aquí lo incluiremos con un require_once.
echo "<form action='index.php'>
        <input type='hidden' name='action' value='buscarLibros'>
        <input type='text' name='textoBusqueda'>
        <input type='submit' value='Buscar'>
      </form><br>";

// Ahora, la tabla con los datos de los libros
if (count($listaLibros) == 0) {
  echo "No hay datos";
} else {
  echo "<table border ='1'>";
  foreach ($listaLibros as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->titulo . "</td>";
    echo "<td>" . $fila->genero . "</td>";
    echo "<td>" . $fila->numPaginas . "</td>";
    echo "<td>" . $fila->nombre . "</td>";
    echo "<td>" . $fila->apellido . "</td>";
    echo "<td><a href='index.php?action=formularioModificarLibro&idLibro=" . $fila->idLibro . "'>Modificar</a></td>";
    echo "<td><a href='index.php?action=borrarLibro&idLibro=" . $fila->idLibro . "'>Borrar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
}
echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";