<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jugadores;

class JugadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 100 jugadores usando el factory
        Jugadores::factory()->count(100)->create();
        
        // Opcional: Mensaje de confirmación
        $this->command->info('¡100 jugadores creados exitosamente!');
    }
}
