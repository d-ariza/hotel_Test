<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('acomodacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Añadir el campo 'nombre'
            $table->foreignId('tipo_habitacion_id')->constrained('tipo_habitaciones')->onDelete('cascade'); // Asegurar que la relación se establece correctamente
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('acomodacions');
    }
};
