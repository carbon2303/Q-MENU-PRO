<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Platillo;
use App\Http\Resources\PlatilloResource;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // 1. Traer platillos activos con su categoría
        $platillos = Platillo::with('categoria')
            ->where('activo', true)
            ->get();

        // 2. Devolverlos usando el Resource (Formato limpio)
        return PlatilloResource::collection($platillos);
    }
}