<?php

// app/Http/Controllers/ApiController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class ApiController extends Controller
{
    //
    public function index(){
        $libros = Book::with('author')->get();
        return response()->json($libros);
    }

    // Guardo un libro con store de web.php sin validacion y sin input
    public function store(Request $request){
        try {
            $request->validate([
                'title' => 'required|String',
                'published_year' => 'required|Integer',
                'author_id' => 'required|Integer',
            ]);
            $libro = new Book();
            $libro->title = $request->input('title');
            $libro->author_id = $request->input('author_id');
            $libro->published_year = $request->input('published_year');
            $libro->save();
            return response()->json($libro, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }

    // Borro un libro con destroy de web.php
    public function destroy($id){
        $libro = Book::find($id);
        if($libro){
            $libro->delete();
            return response()->json($libro, 200);
        }else{
            return response()->json(['error' => 'Libro no encontrado'], 404);
        }
    }


}
