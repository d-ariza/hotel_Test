<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TipoHabitacionController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(TipoHabitacion::with('acomodaciones')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'tipo' => 'required|unique:tipo_habitaciones',
        ]);

        $tipoHabitacion = TipoHabitacion::create($request->all());

        return response()->json($tipoHabitacion, 201);
    }

    public function show(TipoHabitacion $tipoHabitacion): JsonResponse
    {
        return response()->json($tipoHabitacion->load('acomodaciones'));
    }

    public function update(Request $request, TipoHabitacion $tipoHabitacion): JsonResponse
    {
        $request->validate([
            'tipo' => 'required|unique:tipo_habitaciones,tipo,' . $tipoHabitacion->id,
        ]);

        $tipoHabitacion->update($request->all());

        return response()->json($tipoHabitacion);
    }

    public function destroy(TipoHabitacion $tipoHabitacion): JsonResponse
    {
        $tipoHabitacion->delete();

        return response()->json(null, 204);
    }
}
