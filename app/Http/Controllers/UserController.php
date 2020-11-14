<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{


    public function showUserList(){

        $usersList= User::all();
        $roles = Role::all();
        return view('adminPanel.usersList', compact('usersList', 'roles'));
    }



}
