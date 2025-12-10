<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlatilloFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->words(3, true),
            'precio' => $this->faker->randomFloat(2, 50, 200),
            'descripcion' => $this->faker->sentence(),
            'imagen' => 'assets/img/portfolio/product-1.jpg',
            // Crea una categoría automáticamente si no se le pasa una
            'categoria_id' => Categoria::factory(),
            'activo' => true,
        ];
    }
}