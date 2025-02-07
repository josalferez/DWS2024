<?php

include_once "models/usuario.php";
include_once "models/libro.php";

class UsuariosController {

    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    // Muestra el formulario de login
    public function formLogin() {
        View::render("usuario/login");
    }

    // Comprueba los datos de login. Si son correctos, el modelo iniciará la sesión y
    // desde aquí se redirige a otra vista. Si no, nos devuelve al formulario de login.
    public function procesarFormLogin() {
        $email = Seguridad::limpiar($_REQUEST["email"]);
        $passwd = Seguridad::limpiar($_REQUEST["password"]);
        $result = $this->usuario->login($email, $passwd);
        if ($result) { 
            header("Location: index.php?controller=LibrosController&action=mostrarListaLibros");
        } else {
            $data["error"] = "Usuario o contraseña incorrectos";
            View::render("usuario/login", $data);
        }
    }

    // Cierra la sesión y nos lleva a la vista de login
    public function cerrarSesion() {
        $this->usuario->cerrarSesion();
        $data["info"] = "Sesión cerrada con éxito";
        View::render("usuario/login", $data);
    }
 
}