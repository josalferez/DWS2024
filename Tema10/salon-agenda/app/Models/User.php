<?php 
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['name', 'email', 'password'];

    // Relación con las citas creadas por el usuario
    public function createdAppointments()
    {
        return $this->hasMany(Appointment::class, 'created_by_employee_id');
    }

    // Relación con las citas atendidas por el usuario
    public function attendedAppointments()
    {
        return $this->hasMany(Appointment::class, 'attended_by_employee_id');
    }
}