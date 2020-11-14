<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Carbon\Carbon;

class UserController extends Controller
{


    public function showUserList()
    {

        $usersList = User::all();
        $roles = Role::all();
        return view('adminPanel.usersList', compact('usersList', 'roles'));
    }

    public function updateUserRole(Request $request)
    {
        $user = User::where('id', $request->UID)->first();
        $user->role_id = $request->role_id;
        if ($user->role_id == config('constants.BANNED_USER')) {
            $user->banned_until = Carbon::now()->addDays(14);
        } else {
            $user->banned_until = null;
        }

        $user->save();

        return redirect('/panel/users')->with('success', 'User role has been updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/panel/users')->with('success', 'User has been deleted successfully');
    }
}
