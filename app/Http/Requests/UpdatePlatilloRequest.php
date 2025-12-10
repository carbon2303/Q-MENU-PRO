<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlatilloRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permiso concedido
    }

    public function rules(): array
    {
        return [
            // 'sometimes' significa: si el usuario envía este dato, valídalo. Si no, ignóralo.
            'nombre' => 'sometimes|string|max:255',
            'precio' => 'sometimes|numeric|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string',
            'categoria_id' => 'sometimes|exists:categorias,id',
            'activo' => 'boolean'
        ];
    }
}