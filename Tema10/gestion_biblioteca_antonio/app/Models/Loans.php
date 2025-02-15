<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Books;

class Loans extends Model
{
    use HasFactory;
    //
    public function books(){
        return $this->belongsTo(Books::class); //un prestamos solo le pertenece a un libro
    }
}
