<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['name', 'surname', 'phone', 'email'];

    // Relación con la tabla appointments (un cliente puede tener varias citas)
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
