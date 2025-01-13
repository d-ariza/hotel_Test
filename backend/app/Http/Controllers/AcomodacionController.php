<?php

namespace App\Http\Controllers;

use App\Models\Acomodacion;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AcomodacionController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Acomodacion::all());
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $this->validateAcomodacion($request);

            $acomodacion = Acomodacion::create($request->all());

            return response()->json($acomodacion, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function show(Acomodacion $acomodacion): JsonResponse
    {
        return response()->json($acomodacion);
    }

    public function update(Request $request, Acomodacion $acomodacion): JsonResponse
    {
        try {
            $this->validateAcomodacion($request, $acomodacion);

            $acomodacion->update($request->all());

            return response()->json($acomodacion);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function destroy(Acomodacion $acomodacion): JsonResponse
    {
        $acomodacion->delete();

        return response()->json(null, 204);
    }

    private function validateAcomodacion(Request $request, Acomodacion $acomodacion = null): void
    {
        $validator = Validator::make($request->all(), [
            'tipo_habitacion_id' => 'required|exists:tipo_habitaciones,id',
            'tipo' => 'required',
            'cantidad' => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $tipoHabitacion = TipoHabitacion::findOrFail($request->input('tipo_habitacion_id'));

        if ($acomodacion && $tipoHabitacion->acomodaciones()
                ->where('tipo', $request->input('tipo'))
                ->where('id', '!=', $acomodacion->id)
                ->exists()) {
            throw new ValidationException($validator, response()->json(['tipo' => 'La acomodación ya existe para este tipo de habitación.'], 422));
        } elseif ($tipoHabitacion->acomodaciones()->where('tipo', $request->input('tipo'))->exists()) {
            throw new ValidationException($validator, response()->json(['tipo' => 'La acomodación ya existe para este tipo de habitación.'], 422));
        }

        $hotel = $tipoHabitacion->hotel;
        $totalHabitaciones = $hotel->acomodaciones->sum('cantidad') + $request->input('cantidad');
        if ($totalHabitaciones > $hotel->numero_habitaciones) {
            throw new ValidationException($validator, response()->json(['cantidad' => 'La cantidad total de habitaciones supera el máximo permitido para el hotel.'], 422));
        }

        if ($this->isInvalidAcomodacion($tipoHabitacion->tipo, $request->input('tipo'))) {
            throw new ValidationException($validator, response()->json(['tipo' => 'Acomodación inválida para el tipo de habitación.'], 422));
        }
    }

    private function isInvalidAcomodacion(string $tipoHabitacion, string $acomodacion): bool
    {
        $validAcomodaciones = [
            'Estándar' => ['Sencilla', 'Doble'],
            'Junior' => ['Triple', 'Cuádruple'],
            'Suite' => ['Sencilla', 'Doble', 'Triple'],
        ];

        return !in_array($acomodacion, $validAcomodaciones[$tipoHabitacion]);
    }
}
