<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Platillo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;       // Actualizar
use Spatie\Permission\Models\Permission; // Actualizar

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       // 1. CREAR ROLES (SPATIE)
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleStaff = Role::create(['name' => 'staff']);

        // 2. CREAR PERMISOS (Opcional pero recomendado por la rúbrica)
        Permission::create(['name' => 'gestionar menu']);
        Permission::create(['name' => 'ver kds']);

        // Asignar permisos a roles
        $roleAdmin->givePermissionTo(['gestionar menu', 'ver kds']);
        $roleStaff->givePermissionTo(['ver kds']);


        // 3. CREAR USUARIOS Y ASIGNAR ROL
        $admin = User::create([
            'name' => 'Gerente General',
            'email' => 'admin@kds.com',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole($roleAdmin); // < ASIGNACIÓN SPATIE

        $cocina = User::create([
            'name' => 'Jefe de Cocina',
            'email' => 'cocina@kds.com',
            'password' => Hash::make('cocina123'),
        ]);
        $cocina->assignRole($roleStaff); // < ASIGNACIÓN SPATIE

        // 2. CREAR CATEGORÍAS
        $catPlatos = Categoria::create(['nombre' => 'Platos Fuertes', 'icono' => 'bi-egg-fried']);
        $catBebidas = Categoria::create(['nombre' => 'Bebidas', 'icono' => 'bi-cup-straw']);
        $catPostres = Categoria::create(['nombre' => 'Postres', 'icono' => 'bi-cake']);

        // 3. CREAR PLATILLOS DE PRUEBA
        
        Platillo::create([
            'nombre' => 'Hamburguesa Clásica',
            'precio' => 120.00,
            'descripcion' => 'Carne de res 150g, queso cheddar, lechuga y tomate.',
            'imagen' => 'assets/img/portfolio/hamburguesa.png',
            'categoria_id' => $catPlatos->id
        ]);

        Platillo::create([
            'nombre' => 'Orden de Tacos',
            'precio' => 85.00,
            'descripcion' => '5 tacos de pastor con piña, cilantro y cebolla.',
            'imagen' => 'assets/img/portfolio/tacos-pastor.png',
            'categoria_id' => $catPlatos->id
        ]);

        Platillo::create([
            'nombre' => 'Pizza de Pepperoni',
            'precio' => 105.00,
            'descripcion' => 'Pizza de pepperoni con queso manchego y salsa de tomate.',
            'imagen' => 'assets/img/portfolio/pizza.png',
            'categoria_id' => $catPlatos->id
        ]);

        Platillo::create([
            'nombre' => 'Spaghetti',
            'precio' => 95.00,
            'descripcion' => 'Plato de spaghetti con salsa de tomate.',
            'imagen' => 'assets/img/portfolio/spaghetti.png',
            'categoria_id' => $catPlatos->id
        ]);

        Platillo::create([
            'nombre' => 'Malteada Fresa',
            'precio' => 60.00,
            'descripcion' => 'Helado de fresa natural con leche y crema batida.',
            'imagen' => 'assets/img/portfolio/malteada-fresa.png',
            'categoria_id' => $catBebidas->id
        ]);
        Platillo::create([
            'nombre' => 'Malteada Vainilla',
            'precio' => 60.00,
            'descripcion' => 'Helado de vainilla natural con leche y crema batida.',
            'imagen' => 'assets/img/portfolio/malteada-vainilla.png',
            'categoria_id' => $catBebidas->id
        ]);
        Platillo::create([
            'nombre' => 'Pastel de Chocolate',
            'precio' => 40.00,
            'descripcion' => 'Pastel de chocolate con berries y crema batida.',
            'imagen' => 'assets/img/portfolio/pastel-chocolate.png',
            'categoria_id' => $catPostres->id
        ]);
        Platillo::create([
            'nombre' => 'Crepa de Chocolate',
            'precio' => 65.00,
            'descripcion' => 'Crepa de harina de trigo con relleno chocolate.',
            'imagen' => 'assets/img/portfolio/crepa-chocolate.png',
            'categoria_id' => $catPostres->id
        ]);
        Platillo::create([
            'nombre' => 'Refresco de Cola',
            'precio' => 25.00,
            'descripcion' => 'Agua carbonatada con jarabe de cola y hielo.',
            'imagen' => 'assets/img/portfolio/refresco-cola.png',
            'categoria_id' => $catBebidas->id
        ]);
        Platillo::create([
            'nombre' => 'Limonada',
            'precio' => 25.00,
            'descripcion' => 'Agua carbonatada con jugo de limón y hielo.',
            'imagen' => 'assets/img/portfolio/refresco-limon.png',
            'categoria_id' => $catBebidas->id
        ]);
    }
}