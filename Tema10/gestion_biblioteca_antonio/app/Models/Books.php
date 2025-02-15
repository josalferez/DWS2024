<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; //esto no se lo que es y al profe no se lo genera
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Loans;
use App\Models\Category;

class Books extends Model
{
    use HasFactory; //esto no se lo que es y al profe no se lo genera
    //
    public function author(){
        return $this->belongsTo(Author::class); //un libro pertenece a un autor
    }

    public function loans(){
        return $this->hasMany(Loans::class); //un libro puede tener varios prestamos
    }

    public function categories(){
        return $this->belongsToMany(Category::class); //un libro puede tener varias categorias
    }
}
