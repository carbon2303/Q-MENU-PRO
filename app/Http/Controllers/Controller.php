<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 * version="1.0.0",
 * title="Documentación API Q-Menu",
 * description="API para gestión de KDS y Menú de Restaurante",
 * @OA\Contact(
 * email="s22030154@itsch.edu.mx"
 * ),
 * @OA\License(
 * name="Apache 2.0",
 * url="http://www.apache.org/licenses/LICENSE-2.0.html"
 * )
 * )
 *
 * @OA\Server(
 * url=L5_SWAGGER_CONST_HOST,
 * description="Servidor Principal de la API"
 * )
 * 
 * // AGREGA ESTO PARA EL CANDADO
 * @OA\SecurityScheme(
 * securityScheme="sanctum",
 * type="http",
 * scheme="bearer",
 * bearerFormat="JWT",
 * description="Ingrese el token obtenido en /login"
 * )
 */
abstract class Controller
{
    //
}
