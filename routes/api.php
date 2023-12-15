<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alumnos',[AlumnoController::class,'index']);
Route::post('/alumnos',[AlumnoController::class,'store']);
Route::put('/alumnos/{id}',[AlumnoController::class,'update']);
Route::delete('/alumnos/{id}',[AlumnoController::class,'destroy']);
Route::get('/docentes',[DocenteController::class,'index']);
Route::post('/docentes',[DocenteController::class,'store']);
Route::put('/docentes/{id}',[DocenteController::class,'update']);
Route::delete('/docentes/{id}',[DocenteController::class,'destroy']);
Route::get('/cursos',[CursoController::class,'index']);
Route::post('/cursos',[CursoController::class,'store']);
Route::put('/cursos/{id}',[CursoController::class,'update']);
Route::delete('/cursos/{id}',[CursoController::class,'destroy']);
Route::get('/asistencias',[AsistenciaController::class,'index']);
Route::post('/asistencias',[AsistenciaController::class,'store']);
Route::put('/asistencias/{id}',[AsistenciaController::class,'update']);
Route::delete('/asistencias/{id}',[AsistenciaController::class,'destroy']);
Route::get('/matriculas',[MatriculaController::class,'index']);
Route::post('/matriculas',[MatriculaController::class,'store']);
Route::put('/matriculas/{id}',[MatriculaController::class,'update']);
Route::delete('/matriculas/{id}',[MatriculaController::class,'destroy']);
