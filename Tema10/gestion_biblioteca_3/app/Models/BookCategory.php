<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    //
    protected $table = "book_category";
    
    public function books(){
        return $this->belongsToMany(Book::class);
    }

    public function category(){
        return $this->belongsToMany(Category::class);
    }
}
