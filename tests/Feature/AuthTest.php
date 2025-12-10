<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Crear roles necesarios
        Role::create(['name' => 'admin']);
    }

    /** @test */
    public function un_usuario_puede_iniciar_sesion()
    {
        // 1. Crear usuario
        $user = User::factory()->create([
            'email' => 'admin@test.com',
            'password' => bcrypt('password123')
        ]);
        $user->assignRole('admin');

        // 2. Intentar Login
        $response = $this->postJson('/api/login', [
            'email' => 'admin@test.com',
            'password' => 'password123'
        ]);

        // 3. Verificar Token y Rol
        $response->assertStatus(200)
                 ->assertJsonStructure(['access_token', 'role']) // Verifica estructura
                 ->assertJson(['role' => 'admin']);
    }

    /** @test */
    public function login_falla_con_credenciales_incorrectas()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'clave_erronea'
        ]);

        $response->assertStatus(401);
    }
}