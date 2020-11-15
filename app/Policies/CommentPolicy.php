<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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

    public function update(User $user, Comment $comment)
    {
        return $comment->user_id == $user->id;
    }

    public function delete(User $user, Comment $comment)
    {
        return $comment->user_id == $user->id || $user->role_id == config('constants.ADMIN');
    }
}
