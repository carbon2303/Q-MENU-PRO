<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    // Permitimos llenar estos campos
    protected $fillable = ['nombre', 'icono', 'activo'];
}