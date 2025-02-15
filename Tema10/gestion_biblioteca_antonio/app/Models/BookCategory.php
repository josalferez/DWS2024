<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;
    //a una categoría pueden pertenecer varios chotos: choto_al_ajillo, choto_ala_brasa, choto_con_guarniciónDeChoto, choto_con_choto....
    public function books(){
        return $this->belongsToMany(Books::class); //una categoria puede tener varios libros
    }

    public function categories(){
        return $this->belongsToMany(Category::class); //un libro puede tener varias categorias
    }
    
}
