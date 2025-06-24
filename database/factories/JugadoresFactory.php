<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Equipos;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jugadores>
 */
class JugadoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posiciones = ['Delantero', 'Mediocampista', 'Defensa', 'Portero'];
        return [
            'nombre' => $this->faker->firstName,
            'apodo' => $this->faker->unique()->userName,
            'posicion' => $this->faker->randomElement($posiciones),
            'edad' => $this->faker->numberBetween(18, 35),
            'equipos_id' => Equipos::inRandomOrder()->first()->id ?? Equipos::factory()->create()->id,
        ];
    }
}
