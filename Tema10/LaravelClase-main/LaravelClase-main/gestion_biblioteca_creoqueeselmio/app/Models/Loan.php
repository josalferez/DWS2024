<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    public function books(){
        return $this->belongsTo(Books::class);
    }
}
