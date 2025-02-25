<?php
namespace Controllers;

// Front controller definitivo. Se puede usar en los siguientes proyectos, porque es igual.
class FrontController{
    public static function main():void{

        if (isset($_GET['controller'])) {

            $nombre_controlador = 'Controllers\\' . $_GET['controller'] . 'Controller';
            
            } else{
                $nombre_controlador = 'Controllers\\'.CONTROLLER_DEFAULT;
                
            } 


            if (class_exists($nombre_controlador)) {
                $controlador = new $nombre_controlador();

                if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                    $action = $_GET['action'];
                    $controlador->$action(); 
                } elseif(!isset($_GET['controller']) && !isset($_GET['action'])) {
                    $action_default = ACTION_DEFAULT;
                    $controlador->$action_default();
                }else {
                    echo ErrorController::show_error404();
            }
        
            } else {
          
                echo ErrorController::show_error404();
        }


    }
}