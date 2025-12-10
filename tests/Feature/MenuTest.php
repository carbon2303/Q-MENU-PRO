<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Platillo;
use App\Models\Categoria;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function el_endpoint_menu_devuelve_estructura_correcta()
    {
        // 1. Crear datos
        $categoria = Categoria::factory()->create(['nombre' => 'Bebidas']);
        Platillo::factory()->create([
            'categoria_id' => $categoria->id,
            'activo' => true
        ]);

        // 2. Consultar
        $response = $this->getJson('/api/menu');

        // 3. Verificar
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => ['id', 'nombre', 'precio', 'categoria'] // Verifica campos
                     ]
                 ]);
    }
}