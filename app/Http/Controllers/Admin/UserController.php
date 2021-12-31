<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function edit(Request $user, int $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.useredit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.useredit', $user)->with('Info','Se asigno el Rol correctamente');
    }

   
}
