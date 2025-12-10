<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Platillo;
use App\Models\Categoria;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlatilloTest extends TestCase
{
    use RefreshDatabase; // Borra la BD de memoria después de cada prueba

    protected function setUp(): void
    {
        parent::setUp();
        // Crear roles necesarios para Spatie
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleStaff = Role::create(['name' => 'staff']);
    }

    /** @test */
    public function el_cliente_puede_ver_el_menu_publico()
    {
        // 1. Crear datos de prueba
        Platillo::factory()->count(3)->create();

        // 2. Hacer la petición (GET /api/menu)
        $response = $this->getJson('/api/menu');

        // 3. Verificar (Assert)
        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data'); // Debe haber 3 platillos
    }

    /** @test */
    public function un_admin_puede_crear_un_platillo()
    {
        // 1. Crear usuario Admin
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        // 2. Crear categoría
        $categoria = Categoria::factory()->create();

        // 3. Datos a enviar
        $datos = [
            'nombre' => 'Hamburguesa Test',
            'precio' => 150.50,
            'descripcion' => 'Prueba automatizada',
            'categoria_id' => $categoria->id,
            'imagen' => 'ruta/imagen.jpg'
        ];

        // 4. Actuar como Admin y enviar POST
        $response = $this->actingAs($admin)->postJson('/api/platillos', $datos);

        // 5. Verificar éxito
        $response->assertStatus(201);
        
        // Verificar que existe en la base de datos
        $this->assertDatabaseHas('platillos', [
            'nombre' => 'Hamburguesa Test',
            'precio' => 150.50
        ]);
    }

    /** @test */
    public function un_staff_no_puede_crear_platillos()
    {
        // 1. Crear usuario Staff
        $staff = User::factory()->create();
        $staff->assignRole('staff');

        $categoria = Categoria::factory()->create();
        
        $datos = [
            'nombre' => 'Intento de Hacker',
            'precio' => 0,
            'categoria_id' => $categoria->id
        ];

        // 2. Actuar como Staff
        $response = $this->actingAs($staff)->postJson('/api/platillos', $datos);

        // 3. Verificar que sea RECHAZADO (403 Forbidden)
        $response->assertStatus(403);

        // Verificar que NO se guardó en la BD
        $this->assertDatabaseMissing('platillos', [
            'nombre' => 'Intento de Hacker'
        ]);
    }
}