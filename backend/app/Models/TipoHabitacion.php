<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipoHabitacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // Reemplazar 'tipo' por 'nombre'
        'hotel_id', // Añadir el campo 'hotel_id' si no está
    ];

    public function acomodaciones(): HasMany
    {
        return $this->hasMany(Acomodacion::class);
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
