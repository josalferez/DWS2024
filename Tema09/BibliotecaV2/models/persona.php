<?php
// MODELO DE PERSONAS

class Persona {

    private $db;

    // Constructor. Conecta con la base de datos.
    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "biblioteca");
    }

    // Devuelve todas las personas de la base de datos en forma de array de objetos
    public function getAll() {
        $result = $this->db->query("SELECT * FROM personas");
        $listaPers = array();
        while ($fila = $result->fetch_object()) {
            $listaPers[] = $fila;
        }
        return $listaPers;
    }

    // Devuelve un array con los ids de los autores de un libro
    public function getAutores($idLibro) {
        // Obtenemos solo los autores del libro que estamos buscando
        $autoresLibro = $this->db->query("SELECT idPersona FROM escriben WHERE idLibro = '$idLibro'");
        // Vamos a convertir esa lista de autores del libro en un array de ids de personas
        $listaAutoresLibro = array();
        while ($autor = $autoresLibro->fetch_object()) {
            $listaAutoresLibro[] = $autor->idPersona;
        }
        return $listaAutoresLibro;
    }
}   