<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;


    public function update(User $user, User $role)
    {
        if ($user->role_id == config('constants.ADMIN') && $role->role_id == config('constants.ADMIN'))
            return false;
        else
            return true;
    }


    public function delete(User $user)
    {
        if ($user->role_id == config('constants.ADMIN'))
            return true;
        else
            return false;
    }


}
