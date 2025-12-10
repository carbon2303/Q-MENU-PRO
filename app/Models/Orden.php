<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = 'ordens'; // Laravel a veces se confunde con el plural, aseguramos el nombre
    protected $fillable = ['mesa', 'cliente', 'total', 'estatus', 'nota_general'];

    // Relación: Una orden tiene muchos detalles
    public function detalles()
    {
        return $this->hasMany(OrdenDetalle::class);
    }
}