<!-- BIBLIOTECA VERSIÓN 2
     Características de esta versión:
       - Código con arquitectura MVC
       - Sin capa de abstracción de datos
       - Sin seguridad, sesiones ni control de acceso
-->
<?php
    include_once("models/libro.php");  // Modelos
    include_once("models/persona.php");
    include_once("view.php");   // Plantilla de vista

    // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "mostrarListaLibros";  // Acción por defecto
    }

    // Creamos un objeto de tipo Biblioteca y llamamos al método $action()
    $biblio = new Biblioteca();
    $biblio->$action();

    class Biblioteca {
        private $db;     // Conexión con la base de datos
        private $libro, $persona; // Modelos

        public function __construct() {
            $this->libro = new Libro();
            $this->persona = new Persona();
        }

        // --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
        public function mostrarListaLibros() {
            $data["listaLibros"] = $this->libro->getAll();
            View::render("libro/all", $data);
        }

        // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

        public function formularioInsertarLibros() {
            $data["todosLosAutores"] = $this->persona->getAll();
            $data["autoresLibro"] = array();  // Array vacío (el libro aún no tiene autores asignados)
            View::render("libro/form", $data);
        }

        // --------------------------------- INSERTAR LIBROS ----------------------------------------

        public function insertarLibro() {
            // Primero, recuperamos todos los datos del formulario
            $titulo = $_REQUEST["titulo"];
            $genero = $_REQUEST["genero"];
            $pais = $_REQUEST["pais"];
            $ano = $_REQUEST["ano"];
            $numPaginas = $_REQUEST["numPaginas"];
            $autores = $_REQUEST["autor"];            

            // Le pedimos al modelo que guarde el libro en la BD
            $result = $this->libro->insert($titulo, $genero, $pais, $ano, $numPaginas);
            if ($result == 1) {
                // Si la inserción del libro ha funcionado, continuamos insertando los autores, pero
                // necesitamos conocer el id del libro que acabamos de insertar
                $idLibro = $this->libro->getMaxId();
                // Ya podemos insertar todos los autores junto con el libro en "escriben"
                $result = $this->libro->insertAutores($idLibro, $autores);
                if ($result > 0) {
                    $data["info"] = "Libro insertado con éxito";
                } else {
                    $data["error"] = "Error al insertar los autores del libro";
                }
            } else {
                // Si la inserción del libro ha fallado, mostramos mensaje de error
                $data["error"] = "Error al insertar el libro";
            }
            $data["listaLibros"] = $this->libro->getAll();
            View::render("libro/all", $data);

        }

        // --------------------------------- BORRAR LIBROS ----------------------------------------

        public function borrarLibro() {
            // Recuperamos el id del libro que hay que borrar
            $idLibro = $_REQUEST["idLibro"];
            // Pedimos al modelo que intente borrar el libro
            $result = $this->libro->delete($idLibro);
            // Comprobamos si el borrado ha tenido éxito
            if ($result == 0) {
                $data["error"] = "Ha ocurrido un error al borrar el libro. Por favor, inténtelo de nuevo";
            } else {
                $data["info"] = "Libro borrado con éxito";
            }
            $data["listaLibros"] = $this->libro->getAll();
            View::render("libro/all", $data);

        }

        // --------------------------------- FORMULARIO MODIFICAR LIBROS ----------------------------------------

        public function formularioModificarLibro() {
            // Recuperamos los datos del libro a modificar
            $data["libro"] = $this->libro->get($_REQUEST["idLibro"]);
            // Renderizamos la vista de inserción de libros, pero enviándole los datos del libro recuperado.
            // Esa vista necesitará la lista de todos los autores y, además, la lista
            // de los autores de este libro en concreto.
            $data["todosLosAutores"] = $this->persona->getAll();
            $data["autoresLibro"] = $this->persona->getAutores($_REQUEST["idLibro"]);
            View::render("libro/form", $data);
        }

        // --------------------------------- MODIFICAR LIBROS ----------------------------------------

        public function modificarLibro() {
            // Primero, recuperamos todos los datos del formulario
            $idLibro = $_REQUEST["idLibro"];
            $titulo = $_REQUEST["titulo"];
            $genero = $_REQUEST["genero"];
            $pais = $_REQUEST["pais"];
            $ano = $_REQUEST["ano"];
            $numPaginas = $_REQUEST["numPaginas"];
            $autores = $_REQUEST["autor"];

            // Pedimos al modelo que haga el update
            $result = $this->libro->update($idLibro, $titulo, $genero, $pais, $ano, $numPaginas);
            if ($result == 1) {
                $data["info"] = "Libro actualizado con éxito";
            } else {
                // Si la modificación del libro ha fallado, mostramos mensaje de error
                $data["error"] = "Ha ocurrido un error al modificar el libro. Por favor, inténtelo más tarde";
            }
            $data["listaLibros"] = $this->libro->getAll();
            View::render("libro/all", $data);
        }

        // --------------------------------- BUSCAR LIBROS ----------------------------------------

        public function buscarLibros() {
            // Recuperamos el texto de búsqueda de la variable de formulario
            $textoBusqueda = $_REQUEST["textoBusqueda"];
            // Buscamos los libros que coinciden con la búsqueda
            $data["listaLibros"] = $this->libro->search($textoBusqueda);
            $data["info"] = "Resultados de la búsqueda: <i>$textoBusqueda</i>";
            // Mostramos el resultado en la misma vista que la lista completa de libros
            View::render("libro/all", $data);
        }

        // --------------------------------- MOSTRAR LISTA DE AUTORES ----------------------------------------
        public function mostrarListaAutores() {
            // Esto está en construcción. Llamaremos a una vista inexistente.
            View::render("autor/all");
        }        

    } // class