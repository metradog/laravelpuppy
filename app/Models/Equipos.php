<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{    
    use HasFactory;
    public $timestamps = false; // Desactiva los timestamps automáticos de Laravel
    protected $table = 'equipos'; // Define el nombre de la tabla
}
