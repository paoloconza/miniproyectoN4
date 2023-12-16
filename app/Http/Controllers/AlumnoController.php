<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *             title="API de registro de asistencia",
 *             version="1.0",
 *             description="listado de URI's de la API alumnos"
 * )
 *
 * @OA\Server(url="http://127.0.0.1:8000")
 */
class AlumnoController extends Controller
{
    /**
     * lista de todos los alumnos
     * @OA\Get (
     *     path="/api/alumnos",
     *     tags={"Alumno"},
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
     *                         property="nombre",
     *                         type="string",
     *                         example="Paolo Lucio"
     *                     ),
     *                     @OA\Property(
     *                         property="apellido",
     *                         type="string",
     *                         example="Conza HAquehua"
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="paolo@gmail.com"
     *                     ),
     *                     @OA\Property(
     *                         property="telefono",
     *                         type="string",
     *                         example="987288269"
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
        return Alumno::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Registrar a un nuevo Alumno
     * @OA\Post (
     *     path="/api/alumnos",
     *     tags={"Alumno"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="nombre",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="apellido",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="telefono",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "nombre":"Paolo Lucio",
     *                     "apellido":"Conza Haquehua",
     *                     "email":"paolo@gmail.com",
     *                     "telefono":"12345678"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="CREATED",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombre", type="string", example="Paolo Lucio"),
     *              @OA\Property(property="apellido", type="string", example="Conza Haquehua"),
     *              @OA\Property(property="email", type="string", example="paolo@gmail.com"),
     *              @OA\Property(property="telefono", type="string", example="12345678"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The apellidos field is required."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
     */
    public function store(Request $request)
    {
        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->email = $request->email;
        $alumno->telefono = $request->telefono;
        $alumno->save();
        return "se creo nuevo alumno";
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Actualizar la información de un alumno
     * @OA\Put (
     *     path="/api/alumnos/{id}",
     *     tags={"Alumno"},
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
     *                          property="nombre",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="apellido",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="telefono",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "nombre": "Paolo Lucio Editado",
     *                     "apellido": "Conza Haquehua Editado",
     *                     "email": "paolo@gmail.com Editado",
     *                     "telefono": "12345678 Editado"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombre", type="string", example="Paolo Lucio Editado"),
     *              @OA\Property(property="apellido", type="string", example="Conza Haquehua Editado"),
     *              @OA\Property(property="email", type="string", example="paolo@gmail.com Editado"),
     *              @OA\Property(property="telefono", type="string", example="12345678 Editado"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The apellidos field is required."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
     */
    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->email = $request->email;
        $alumno->telefono = $request->telefono;
        $alumno->save();
        return "Se actualizo correctamente";
    }

    /**
     * Eliminar la información de un alumno
     * @OA\Delete (
     *     path="/api/alumnos/{id}",
     *     tags={"Alumno"},
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
        $alumno = Alumno::find($id);
        $alumno->delete();
        return "Se elimino el registro";

        // try {
        //     $alumno = Alumno::find($id);
        //     $alumno->delete();
        //     return "Se eliminó el registro correctamente";
        // } catch (\Exception $e) {
        //     // Log del error
        //     \Log::error('Error al eliminar alumno: ' . $e->getMessage());

        //     // Puedes devolver un mensaje de error al cliente
        //     return response()->json(['error' => 'No se pudo eliminar el registro'], 500);
        // }
    }
}
