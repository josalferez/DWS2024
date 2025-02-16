<?php
// MODELO DE PERSONAS

namespace Models;


include_once "model.php";



class Autor extends Model {

    // Constructor. Conecta con la base de datos.
    public function __construct() {
        $this->table = "autores";
        $this->idColumn = "idAutor";
        parent::__construct();
    }

    // Devuelve un array con los ids de los autores de un libro
    public function getAutores($idLibro) {
        // Obtenemos solo los autores del libro que estamos buscando
        $autoresLibro = $this->db->dataQuery("SELECT idPersona FROM escriben WHERE idLibro = '$idLibro'");
        // Vamos a convertir esa lista de autores del libro en un array de ids de personas
        return $autoresLibro;
    }
}