<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("usersAdmin", compact("users"));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view("editUser", compact("user")); 
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); 

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|in:0,1,2,3,4',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
        ]);
        
        return redirect()->route('users.index')->with('success', 'Данные пользователя успешно обновлены.');
    }
}
