<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{
    public function index()
    {
        $restaurantes = Restaurante::all();
        if ($restaurantes->isEmpty()) {
            return response()->json(['message' => 'No hay restaurantes registrados'], 200);
        }
        return response()->json($restaurantes, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'direccion'  => 'required|max:255',
            'telefono' => 'required|max:20'

        ]);

        if ($validator->fails()) {
            $data = [
                'message'  => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $restaurante = Restaurante::create([
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
        ]);

        if (!$restaurante) {
            $data = [
                'message' => 'Error al crear el restaurante',
                'estatus' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'restaurante' => $restaurante,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $restaurante = Restaurante::find($id);

        if (!$restaurante) {
            $data = [
                'message' => 'Restaurante no encontrado.',
                'estatus' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'restaurante' => $restaurante,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $restaurante = Restaurante::find($id);

        if (!$restaurante) {
            $data = [
                'message' => 'Restaurante no encontrado.',
                'estatus' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'direccion'  => 'required|max:255',
            'telefono' => 'required|max:20'

        ]);

        if ($validator->fails()) {
            $data = [
                'message'  => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $restaurante->nombre = $request->input('nombre');
        $restaurante->direccion = $request->input('direccion');
        $restaurante->telefono = $request->input('telefono');

        $restaurante->save();

        $data = [
            'message' => 'Datos actualizados correctamente',
            'restaurante' => $restaurante,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function partialUpdate(Request $request, $id)
{
    $restaurante = Restaurante::find($id);

    if (!$restaurante) {
        return response()->json([
            'message' => 'Restaurante no encontrado',
            'status' => 404
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'nombre' => 'sometimes|required|string|max:100',
        'direccion' => 'sometimes|required|string|max:255',
        'telefono' => 'sometimes|required|string|max:20'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Error en la validación',
            'errors' => $validator->errors(),
            'status' => 400
        ], 400);
    }

    $restaurante->update($request->only(['nombre', 'direccion', 'telefono']));

    return response()->json([
        'message' => 'Restaurante actualizado correctamente',
        'restaurante' => $restaurante,
        'status' => 200
    ], 200);
}


    public function destroy($id)
    {
        $restaurante = Restaurante::find($id);

        if (!$restaurante) {
            $data = [
                'message' => 'Restaurante no encontrado.',
                'estatus' => 404
            ];
            return response()->json($data, 404);
        }

        $restaurante->delete();

        $data = [
            'message' => 'Restaurante eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
