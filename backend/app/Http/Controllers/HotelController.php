<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HotelController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Hotel::all());
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'nit' => 'required|string|max:255|unique:hotels',
            'numero_habitaciones' => 'required|integer|max:255',
        ]);

        if (Hotel::where('nombre', $request->input('nombre'))
            ->where('direccion', $request->input('direccion'))
            ->where('ciudad', $request->input('ciudad'))
            ->exists()) {
            return response()->json(['error' => 'El hotel ya existe.'], 422);
        }

        $hotel = Hotel::create($request->all());
        return response()->json($hotel, 201);
    }

    public function show($id): JsonResponse
    {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'nombre' => 'string',
            'direccion' => 'string',
            'ciudad' => 'string',
            'nit' => 'string|unique:hotels,nit,' . $id,
            'numero_habitaciones' => 'integer',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());

        return response()->json($hotel);
    }

    public function destroy($id): JsonResponse
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return response()->json(null, 204);
    }
}
