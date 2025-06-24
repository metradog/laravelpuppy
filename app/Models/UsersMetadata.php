<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Testing\Fluent\Concerns\Has;

use App\Models\User; // Asegúrate de importar el modelo User si lo necesitas
use App\Models\Perfiles; // Asegúrate de importar el modelo Perfiles si lo necesitas

class UsersMetadata extends Model
{
    use HasFactory;
    public $timestamps = false; // Desactiva los timestamps automáticos de Laravel
    protected $table = 'users_metadata'; // Define el nombre de la tabla

    public function users()
    {
        return $this->belongsTo(User::class); // Relación con el modelo User
    }

    public function perfiles()
    {
        return $this->belongsTo(Perfiles::class); // Relación con el modelo Perfiles
    }

}
