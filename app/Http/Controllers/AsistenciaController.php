<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Asistencia::all();
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
        $asistencia = new Asistencia();
        $asistencia->alumno_id = $request->alumno_id;
        $asistencia->curso_id = $request->curso_id;
        $asistencia->fecha_asistencia = $request->fecha_asistencia;
        $asistencia->estado = $request->estado;
        $asistencia->save();
        return "Asistencia registrada";
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $asistencia = Asistencia::find($id);
        $asistencia->alumno_id = $request->alumno_id;
        $asistencia->curso_id = $request->curso_id;
        $asistencia->fecha_asistencia = $request->fecha_asistencia;
        $asistencia->estado = $request->estado;
        $asistencia->save();
        return "Se actualizo la asistencia";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id);
        $asistencia->delete();
        return "Asistencia eliminada";
    }
}
