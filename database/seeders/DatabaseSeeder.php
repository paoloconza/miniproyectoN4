<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alumno;
use App\Models\Asistencia;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Matricula;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $alumnoSeeder = new AlumnoSeeder();
        $alumnoSeeder->run();
        $docenteSeeder = new DocenteSeeder();
        $docenteSeeder->run();
        $cursoSeeder = new CursoSeeder();
        $cursoSeeder->run();
        $matriculaSeeder = new MatriculaSeeder();
        $matriculaSeeder->run();
        $asistenciaSeeder = new AsistenciaSeeder();
        $asistenciaSeeder->run();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
