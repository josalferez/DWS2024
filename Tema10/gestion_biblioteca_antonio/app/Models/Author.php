<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; //esto no se lo que es y al profe no se lo genera
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory; //esto no se lo que es y al profe no se lo genera
    //
    public function books(){
        return $this->hasMany(Books::class);
    }
}
