<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenDetalle extends Model
{
    use HasFactory;
    protected $fillable = ['orden_id', 'platillo_id', 'cantidad', 'precio', 'notas'];
    
    public function platillo()
    {
        return $this->belongsTo(Platillo::class);
    }
}