<?php

// MODELO DE LIBROS
namespace models;

class Libro extends Model
{

    // Constructor. Especifica el nombre de la tabla de la base de datos
    public function __construct()
    {
        $this->table = "libros";
        $this->idColumn = "idLibro";
        parent::__construct();
    }

    // Devuelve el último id asignado en la tabla de libros
    public function getMaxId()
    {
        $result = $this->db->dataQuery("SELECT MAX(idLibro) AS ultimoIdLibro FROM libros");
        return $result[0]->ultimoIdLibro;
    }

    // Inserta un libro. Devuelve 1 si tiene éxito o 0 si falla.
    public function insert($titulo, $genero, $pais, $ano, $numPaginas)
    {
        return $this->db->dataManipulation("INSERT INTO libros (titulo,genero,pais,ano,numPaginas) VALUES ('$titulo','$genero', '$pais', '$ano', '$numPaginas')");
    }

    // Inserta los autores de un libro. Recibe el id del libro y la lista de ids de los autores en forma de array.
    // Devuelve el número de autores insertados con éxito (0 en caso de fallo).
    public function insertAutores($idLibro, $autores)
    {
        $correctos = 0;
        foreach ($autores as $idAutor) {
            $result = $this->db->dataManipulation("INSERT INTO escriben(idLibro, idPersona) VALUES('$idLibro', '$idAutor')");
            if ($result) {
                $correctos++;
            }
        }
        return $correctos;
    }

    // Actualiza un libro (todo menos sus autores). Devuelve 1 si tiene éxito y 0 en caso de fallo.
    public function update($idLibro, $titulo, $genero, $pais, $ano, $numPaginas)
    {
        $ok = $this->db->dataManipulation("UPDATE libros SET
                                titulo = '$titulo',
                                genero = '$genero',
                                pais = '$pais',
                                ano = '$ano',
                                numPaginas = '$numPaginas'
                                WHERE idLibro = '$idLibro'");
        return $ok;
    }

    // Busca un texto en las tablas de libros y autores. Devuelve un array de objetos con todos los libros
    // que cumplen el criterio de búsqueda.
    public function search($textoBusqueda)
    {
        // Buscamos los libros de la biblioteca que coincidan con el texto de búsqueda
        $result = $this->db->dataQuery("SELECT * FROM libros
					                    INNER JOIN escriben ON libros.idLibro = escriben.idLibro
					                    INNER JOIN personas ON escriben.idPersona = personas.idPersona
					                    WHERE libros.titulo LIKE '%$textoBusqueda%'
					                    OR libros.genero LIKE '%$textoBusqueda%'
					                    OR personas.nombre LIKE '%$textoBusqueda%'
					                    OR personas.apellido LIKE '%$textoBusqueda%'
					                    ORDER BY libros.titulo");
        return $result;
    }

    // He tenido que sobrecargar este método para poder mostrar la lista de libros con los nombres de los autores
    // Porque el getAll() de la clase Model devuelve solo los datos de la tabla libros pero no los autores.
    public function getAll()
    {
        $sql = "SELECT libros.*, personas.nombre, personas.apellido
            FROM libros
            LEFT JOIN escriben ON libros.idLibro = escriben.idLibro
            LEFT JOIN personas ON escriben.idPersona = personas.idPersona";


        return $this->db->dataQuery($sql);
    }

}
