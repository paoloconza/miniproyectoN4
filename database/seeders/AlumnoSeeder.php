<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumno::factory(10)->create();
        // $alumno = Alumno::factory()->make(); // Solo crea una instancia, no la inserta
        // $alumno->save(); // Ahora la inserta en la base de datos

    }
}
