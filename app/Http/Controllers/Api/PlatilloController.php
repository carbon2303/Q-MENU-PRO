<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Platillo;
use App\Http\Resources\PlatilloResource;
use App\Http\Requests\StorePlatilloRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePlatilloRequest;

class PlatilloController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/menu",
     * summary="Obtener el menú público",
     * description="Devuelve la lista de todos los platillos activos con su categoría.",
     * tags={"Menú"},
     * @OA\Response(
     * response=200,
     * description="Operación exitosa. Devuelve un array de platillos.",
     * @OA\JsonContent(type="object")
     * )
     * )
     */
    // 1. VER MENÚ (GET /api/platillos)
    public function index()
    {
        // Trae los platillos activos e incluye la información de su categoría
        $platillos = Platillo::with('categoria')->where('activo', true)->get();
        
        // Devuelve la lista formateada
        return PlatilloResource::collection($platillos);
    }

    /**
     * @OA\Post(
     * path="/api/platillos",
     * summary="Crear un nuevo platillo",
     * tags={"Administración"},
     * security={{"sanctum":{}}},
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(
     * required={"nombre","precio","categoria_id"},
     * @OA\Property(property="nombre", type="string", example="Hamburguesa Suprema"),
     * @OA\Property(property="precio", type="number", format="float", example=180.50),
     * @OA\Property(property="descripcion", type="string", example="Con tocino extra"),
     * @OA\Property(property="imagen", type="string", example="assets/img/portfolio/product-1.jpg"),
     * @OA\Property(property="categoria_id", type="integer", example=1)
     * )
     * ),
     * @OA\Response(
     * response=201,
     * description="Platillo creado exitosamente"
     * ),
     * @OA\Response(response=401, description="No autorizado (Falta Token)"),
     * @OA\Response(response=403, description="Prohibido (No es Admin)")
     * )
     */
    // 2. CREAR PLATILLO (POST /api/platillos)
    public function store(StorePlatilloRequest $request)
    {
        // 1. Verificar política de seguridad
        // Si no es admin, Laravel detiene todo y lanza error 403
        if ($request->user()->cannot('create', Platillo::class)) {
            abort(403, 'No tienes permiso para crear platillos. Solo Gerentes.');
        }
        
        // Si llega aquí, es que ya pasó la validación del Request
        $platillo = Platillo::create($request->validated());

        return response()->json([
            'message' => 'Platillo creado exitosamente',
            'data' => new PlatilloResource($platillo)
        ], 201);
    }

    /**
     * @OA\Get(
     * path="/api/platillos/{id}",
     * summary="Ver detalles de un platillo",
     * tags={"Administración"},
     * security={{"sanctum":{}}},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID del platillo",
     * @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     * response=200,
     * description="Datos del platillo recuperados"
     * ),
     * @OA\Response(response=404, description="Platillo no encontrado")
     * )
     */
    // 3. VER UN SOLO PLATILLO (GET /api/platillos/{id})
    public function show($id)
    {
        $platillo = Platillo::findOrFail($id);
        return new PlatilloResource($platillo);
    }

    /**
     * @OA\Delete(
     * path="/api/platillos/{id}",
     * summary="Eliminar un platillo",
     * tags={"Administración"},
     * security={{"sanctum":{}}},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     * response=200,
     * description="Platillo eliminado"
     * )
     * )
     */
    // 4. BORRAR PLATILLO (DELETE /api/platillos/{id})
    public function destroy($id)
    {
        $platillo = Platillo::findOrFail($id);

        try {
            // INTENTO 1: Borrado Físico (Eliminar de la BD)
            $platillo->delete();
            $mensaje = 'Platillo eliminado permanentemente de la base de datos.';
            
        } catch (\Illuminate\Database\QueryException $e) {
            // INTENTO 2: Si falla (porque hay órdenes vinculadas), hacemos Borrado Lógico
            // Error 1451 = Foreign Key Constraint
            if ($e->getCode() == "23000") {
                $platillo->activo = false;
                $platillo->save();
                $mensaje = 'El platillo tiene ventas asociadas. Se ha desactivado en lugar de borrarse.';
            } else {
                throw $e; // Si es otro error, que truene
            }
        }

        return response()->json(['message' => $mensaje]);
    }

    /**
     * @OA\Put(
     * path="/api/platillos/{id}",
     * summary="Actualizar un platillo",
     * tags={"Administración"},
     * security={{"sanctum":{}}},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * @OA\Schema(type="integer")
     * ),
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(
     * @OA\Property(property="nombre", type="string", example="Hamburguesa Modificada"),
     * @OA\Property(property="precio", type="number", example=190.00)
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="Platillo actualizado correctamente"
     * )
     * )
     */
    // 5. ACTUALIZAR (PUT /api/platillos/{id})
    public function update(UpdatePlatilloRequest $request, $id)
    {
        $platillo = Platillo::findOrFail($id);
        
        // Actualizamos solo los campos que enviaron
        $platillo->update($request->validated());

        return response()->json([
            'message' => 'Platillo actualizado correctamente',
            'data' => new PlatilloResource($platillo)
        ]);
    }
}