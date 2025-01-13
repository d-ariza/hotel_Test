<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Hotel;

class HotelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a new hotel.
     *
     * @return void
     */
    public function test_create_hotel()
    {
        $response = $this->postJson('/api/hotels', [
            'nombre' => 'Hotel Test',
            'direccion' => '123 Calle Principal',
            'ciudad' => 'Bogotá',
            'nit' => '123456789',
            'numero_habitaciones' => 100,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'nombre' => 'Hotel Test',
                'direccion' => '123 Calle Principal',
                'ciudad' => 'Bogotá',
                'nit' => '123456789',
                'numero_habitaciones' => 100,
            ]);
    }

    /**
     * Test getting all hotels.
     *
     * @return void
     */
    public function test_get_all_hotels()
    {
        Hotel::factory()->count(3)->create();

        $response = $this->getJson('/api/hotels');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /**
     * Test getting a single hotel.
     *
     * @return void
     */
    public function test_get_hotel()
    {
        $hotel = Hotel::factory()->create();

        $response = $this->getJson("/api/hotels/{$hotel->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $hotel->id,
                'nombre' => $hotel->nombre,
                'direccion' => $hotel->direccion,
                'ciudad' => $hotel->ciudad,
                'nit' => $hotel->nit,
                'numero_habitaciones' => $hotel->numero_habitaciones,
            ]);
    }

    /**
     * Test updating a hotel.
     *
     * @return void
     */
    public function test_update_hotel()
    {
        $hotel = Hotel::factory()->create();

        $response = $this->putJson("/api/hotels/{$hotel->id}", [
            'nombre' => 'Hotel Actualizado',
            'direccion' => '123 Calle Principal',
            'ciudad' => 'Bogotá',
            'nit' => '123456789',
            'numero_habitaciones' => 150,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $hotel->id,
                'nombre' => 'Hotel Actualizado',
                'direccion' => '123 Calle Principal',
                'ciudad' => 'Bogotá',
                'nit' => '123456789',
                'numero_habitaciones' => 150,
            ]);
    }

    /**
     * Test deleting a hotel.
     *
     * @return void
     */
    public function test_delete_hotel()
    {
        $hotel = Hotel::factory()->create();

        $response = $this->deleteJson("/api/hotels/{$hotel->id}");

        $response->assertStatus(204);
    }
}
