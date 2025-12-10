<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Platillo;
use App\Models\Categoria;

class OrdenTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_cliente_puede_crear_una_orden()
    {
        // 1. Preparar datos (Crear platillos para pedir)
        $categoria = Categoria::factory()->create();
        $platillo = Platillo::factory()->create(['categoria_id' => $categoria->id]);

        $datosOrden = [
            'mesa' => 'Mesa 5',
            'total' => 150.00,
            'nota_general' => 'Sin cebolla ni pepinillos',
            'detalles' => [
                [
                    'id' => $platillo->id,
                    'cantidad' => 2,
                    'precio' => 75.00,
                    'notas' => 'Bien cocido'
                ]
            ]
        ];

        // 2. Ejecutar (POST /api/ordenar)
        $response = $this->postJson('/api/ordenar', $datosOrden);

        // 3. Verificar (Asserts)
        $response->assertStatus(201)
                 ->assertJson(['success' => true]);

        // Verificar que la ORDEN se guardó en la BD
        $this->assertDatabaseHas('ordens', [
            'mesa' => 'Mesa 5',
            'total' => 150.00
        ]);

        // Verificar que el DETALLE se guardó
        $this->assertDatabaseHas('orden_detalles', [
            'platillo_id' => $platillo->id,
            'cantidad' => 2
        ]);
    }

    /** @test */
    public function la_orden_falla_si_faltan_datos()
    {
        $response = $this->postJson('/api/ordenar', []); // Enviamos vacío
        $response->assertStatus(422); // Error de validación
    }
}