<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * LOGIN: Intercambia credenciales por un Token
     */
    public function login(Request $request)
    {
        // 1. Validar que enviaron correo y contraseña
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Buscar al usuario por correo
        $user = User::where('email', $request->email)->first();

        // 3. Verificar si existe y si la contraseña es correcta
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas. Intenta de nuevo.'
            ], 401); // 401 = No autorizado
        }

        // 4. ¡Éxito! Generamos el Token (El Boleto)
        // 'auth_token' es el nombre interno que le damos al boleto
        $token = $user->createToken('auth_token')->plainTextToken;
        $rol = $user->getRoleNames()->first();

        // 5. Devolvemos el Token y el Rol al cliente
        return response()->json([
            'message' => 'Hola ' . $user->name,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user_id' => $user->id,
            'role' => $rol, // Para saber si mandarlo a Admin o Staff
        ], 200);
    }

    /**
     * LOGOUT: Destruye el Token (Cierra sesión)
     */
    public function logout(Request $request)
    {
        // Borra el token que se usó para esta petición específica
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ]);
    }
}