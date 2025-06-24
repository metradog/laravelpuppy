<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Perfiles extends Model
{
    use HasFactory;
    public $timestamps = false; // Desactiva los timestamps automáticos de Laravel
    protected $table = 'perfiles'; // Define el nombre de la tabla
}
