<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
     /**
     * lista de todos los cursos
     * @OA\Get (
     *     path="/api/cursos",
     *     tags={"Curso"},
     *     @OA\Response(
     *         response=200,
     *         description="ok",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="curso",
     *                         type="string",
     *                         example="Matematicas"
     *                     ),
     *                     @OA\Property(
     *                         property="descripcion",
     *                         type="string",
     *                         example="hablamos de numeros"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2023-02-23T00:09:16.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2023-02-23T12:33:45.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Curso::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Registrar un nuevo curso
     * @OA\Post (
     *     path="/api/cursos",
     *     tags={"Curso"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="curso",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="descripcion",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "curso":"Matematica",
     *                     "descripcion":"Hablamos de numeros"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="CREATED",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="curso", type="string", example="Matematica"),
     *              @OA\Property(property="descripcion", type="string", example="Hablamos de numeros"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="el campo curso es requerido."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
     */
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->curso = $request->nombre;
        $curso->descripcion = $request->apellido;
        $curso->save();
        return "se creo nuevo curso";
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

     /**
     * Actualizar la información de un curso
     * @OA\Put (
     *     path="/api/cursos/{id}",
     *     tags={"Curso"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="curso",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="descripcion",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "curso": "Matematica Editado",
     *                     "descripcion": "Hablamos de numeros Editado"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="curso", type="string", example="Matematica Editado"),
     *              @OA\Property(property="descripcion", type="string", example="Hablamos de numeros Editado"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="el campo curso es requerido."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        $curso->curso = $request->curso;
        $curso->descripcion = $request->descripcion;
        $curso->save();
        return "Se actualizo correctamente";
    }

    /**
     * Eliminar la información de un alumno
     * @OA\Delete (
     *     path="/api/cursos/{id}",
     *     tags={"Curso"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="NO CONTENT"
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No se pudo realizar correctamente la operación"),
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        return "Se elimino el registro";
    }
}
