<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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



    public function create(User $user)
    {
        return $user->role_id == config('constants.ADMIN') || $user->role_id == config('constants.PRIVILEGED_USER');
    }



    public function update(User $user, Post $post)
    {
        return $post->author_id == $user->id || $user->role_id == config('constants.ADMIN');
    }

    public function delete(User $user, Post $post)
    {
        return $post->author_id == $user->id || $user->role_id == config('constants.ADMIN');
    }
}
