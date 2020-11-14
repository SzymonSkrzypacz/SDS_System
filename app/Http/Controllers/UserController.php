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

    public function updateUserRole(Request $request){
        $input = $request->only('role_id');

        $UID = $request->only('UID');
        User::where('id', $UID['UID'])
            ->update($input);

        return redirect ('/panel/users')->with('success','User role has been updated successfully');
    }

    public function deleteUser($id){
        $user=User::find($id);
        $user->delete();
        return redirect('/panel/users')->with('success','User has been deleted successfully');
    }

}
