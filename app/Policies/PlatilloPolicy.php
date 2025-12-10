<?php

namespace App\Policies;

use App\Models\Platillo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlatilloPolicy
{
    // ¿Quién puede ver el menú? ¡Cualquiera con login (Staff y Admin)!
    public function viewAny(User $user): bool
    {
        return true; 
    }

    // ¿Quién puede ver un platillo específico? ¡Cualquiera!
    public function view(User $user, Platillo $platillo): bool
    {
        return true;
    }

    // ¿Quién puede crear platillos nuevos? SOLO EL ADMIN
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    // ¿Quién puede editar? SOLO EL ADMIN
    public function update(User $user, Platillo $platillo): bool
    {
        return $user->hasRole('admin');
    }

    // ¿Quién puede borrar? SOLO EL ADMIN
    public function delete(User $user, Platillo $platillo): bool
    {
        return $user->hasRole('admin');
    }
}
