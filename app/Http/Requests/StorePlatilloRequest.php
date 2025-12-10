<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlatilloRequest extends FormRequest
{
    // 1. ¡CAMBIA ESTO A TRUE! Si lo dejas en false, te dará error 403.
    public function authorize(): bool
    {
        return true;
    }

    // 2. Reglas de validación
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string', // Después veremos como subir archivos reales
            'categoria_id' => 'required|exists:categorias,id', // Debe existir la categoría
        ];
    }
}