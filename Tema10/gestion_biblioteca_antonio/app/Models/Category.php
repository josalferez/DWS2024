<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //
    public function books(){
        return $this->belongsToMany(Books::class); //una categoria puede tener varios libros
    }
}
