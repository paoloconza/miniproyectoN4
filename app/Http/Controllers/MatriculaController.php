<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Matricula::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matricula = new Matricula();
        $matricula->alumno_id = $request->alumno_id;
        $matricula->curso_id = $request->apellido;
        $matricula->fecha_matriculacion = $request->fecha_matriculacion;
        $matricula->save();
        return "se registro una nueva matricula";
    }

    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $matricula = Matricula::find($id);
        $matricula->alumno_id = $request->alumno_id;
        $matricula->curso_id = $request->apellido;
        $matricula->fecha_matriculacion = $request->fecha_matriculacion;
        $matricula->save();
        return "Modificacion exitosa de la matricula";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matricula = Matricula::find($id);
        $matricula->delete();
        return "Se elimino la matricula";
    }
}
