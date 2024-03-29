<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates =
    [
        'banned_until',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post', 'author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'author_id');
    }


    public function is_admin()
    {
        $role = $this->role_id;
        if ($role == config('constants.ADMIN')) {
            return true;
        }
        return false;
    }
    public function is_privileged_user()
    {
        $role = $this->role_id;
        if ($role == config('constants.PRIVILEGED_USER')) {
            return true;
        }
        return false;
    }
}
