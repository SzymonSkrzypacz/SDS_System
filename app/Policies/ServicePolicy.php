<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user)
    {
        if ($user->role_id == config('constants.ADMIN'))
            return true;
        else
            return false;
    }

    public function edit(User $user)
    {
        if ($user->role_id == config('constants.ADMIN'))
            return true;
        else
            return false;
    }
}
