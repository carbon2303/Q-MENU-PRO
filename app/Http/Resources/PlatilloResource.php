<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlatilloResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'precio' => (float) $this->precio, // Lo forzamos a ser número
            'descripcion' => $this->descripcion,
            'imagen' => asset($this->imagen), // ¡Importante! Genera la URL completa (http://...)
            'categoria' => $this->categoria->nombre, // Muestra el nombre de la categoría, no el ID
            'activo' => (bool) $this->activo,
        ];
    }
}