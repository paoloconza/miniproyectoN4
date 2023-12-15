<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asistencia>
 */
class AsistenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alumno_id' => fake()->randomElement(\App\Models\Alumno::pluck('id')),
            'curso_id' => fake()->randomElement(\App\Models\Curso::pluck('id')),
            'fecha_asistencia' => fake()->date(),
            'estado' => fake()->randomElement(['A', 'T', 'F']),
        ];
    }
}
