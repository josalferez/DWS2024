<?php

//C:\xampp\htdocs\dashboard\2_SEGUNDO TRIMESTRE\Tema10\gestion_biblioteca\app/Http/Controllers/ApiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books; //importamos el modelo Books

class ApiController extends Controller
{
    //Implementamos la funcion index
    public function index(){
        $libro = Books::with('author')->get(); //obtenemos todos los libros con sus autores
        return response() -> json($libro); //devolvemos los libros en formato json
    }
}
