<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curso::factory(3)->create();

        // $curso = Curso::factory()->make(); // Solo crea una instancia, no la inserta
        // $curso->save(); // Ahora la inserta en la base de datos
        }
}
