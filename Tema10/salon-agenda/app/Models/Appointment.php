<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['date', 'time', 'description', 'client_id', 'created_by_employee_id', 'attended_by_employee_id'];

    // Relación con la tabla contacts (una cita pertenece a un cliente)
    public function client()
    {
        return $this->belongsTo(Contact::class);
    }

    // Relación con la tabla users (el empleado que creó la cita)
    public function createdByEmployee()
    {
        return $this->belongsTo(User::class, 'created_by_employee_id');
    }

    // Relación con la tabla users (el empleado que atendió la cita)
    public function attendedByEmployee()
    {
        return $this->belongsTo(User::class, 'attended_by_employee_id');
    }
}
