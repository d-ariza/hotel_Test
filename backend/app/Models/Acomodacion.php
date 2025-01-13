<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Acomodacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_habitacion_id',
        'tipo',
        'cantidad',
    ];

    public function tipoHabitacion(): BelongsTo
    {
        return $this->belongsTo(TipoHabitacion::class);
    }
}
