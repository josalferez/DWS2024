<?php

// MODELO DE LIBROS

class Libro
{

    private $db;

    // Constructor. Habilita la conexión con la base de datos.
    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "biblioteca");
    }

    // Obtiene todos los libros de la base de datos y los devuelve como un array de objetos
    public function getAll()
    {
        $resultado = $this->db->query("SELECT * FROM libros
                                        INNER JOIN escriben ON libros.idLibro = escriben.idLibro
                                        INNER JOIN personas ON escriben.idPersona = personas.idPersona
                                        ORDER BY libros.titulo");
        $listaLibros = array();
        while ($fila = $resultado->fetch_object()) {
            $listaLibros[] = $fila;
        }
        return $listaLibros;
    }

    // Obtiene un libro de la base de datos y lo devuelve como un objeto
    public function get($id)
    {
        $result = $this->db->query("SELECT * FROM libros WHERE libros.idLibro = '$id'");
        $libro = $result->fetch_object();
        return $libro;
    }

    // Devuelve el último id asignado en la tabla de libros
    public function getMaxId()
    {
        $result = $this->db->query("SELECT MAX(idLibro) AS ultimoIdLibro FROM libros");
        $idLibro = $result->fetch_object()->ultimoIdLibro;
        return $idLibro;
    }

    // Inserta un libro. Devuelve 1 si tiene éxito o 0 si falla.
    public function insert($titulo, $genero, $pais, $ano, $numPaginas)
    {
        $this->db->query("INSERT INTO libros (titulo,genero,pais,ano,numPaginas) VALUES ('$titulo','$genero', '$pais', '$ano', '$numPaginas')");
        return $this->db->affected_rows;
    }

    // Inserta los autores de un libro. Recibe el id del libro y la lista de ids de los autores en forma de array.
    // Devuelve el número de autores insertados con éxito (0 en caso de fallo).
    public function insertAutores($idLibro, $autores)
    {
        $correctos = 0;
        foreach ($autores as $idAutor) {
            $this->db->query("INSERT INTO escriben(idLibro, idPersona) VALUES('$idLibro', '$idAutor')");
            if ($this->db->affected_rows == 1) $correctos++;
        }
        return $correctos;
    }

    // Actualiza un libro (todo menos sus autores). Devuelve 1 si tiene éxito y 0 en caso de fallo.
    public function update($idLibro, $titulo, $genero, $pais, $ano, $numPaginas)
    {
        $this->db->query("UPDATE libros SET
            titulo = '$titulo',
            genero = '$genero',
            pais = '$pais',
            ano = '$ano',
            numPaginas = '$numPaginas'
            WHERE idLibro = '$idLibro'");
        return $this->db->affected_rows;
    }

    // Elimina un libro. Devuelve 1 si tiene éxito y 0 en caso de fallo.
    public function delete($idLibro)
    {
        $this->db->query("DELETE FROM libros WHERE idLibro = '$idLibro'");
        return $this->db->affected_rows;
    }

    // Busca un texto en las tablas de libros y autores. Devuelve un array de objetos con todos los libros
    // que cumplen el criterio de búsqueda.
    public function search($textoBusqueda)
    {
        // Buscamos los libros de la biblioteca que coincidan con el texto de búsqueda
        $result = $this->db->query("SELECT * FROM libros
					INNER JOIN escriben ON libros.idLibro = escriben.idLibro
					INNER JOIN personas ON escriben.idPersona = personas.idPersona
					WHERE libros.titulo LIKE '%$textoBusqueda%'
					OR libros.genero LIKE '%$textoBusqueda%'
					OR personas.nombre LIKE '%$textoBusqueda%'
					OR personas.apellido LIKE '%$textoBusqueda%'
					ORDER BY libros.titulo");
        $listaLibros = array();
        while ($fila = $result->fetch_object()) {
            $listaLibros[] = $fila;
        }
        return $listaLibros;
    }
}