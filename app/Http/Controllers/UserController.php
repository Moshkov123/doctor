<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = auth()->user();
    
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;

        return view('dashboard', [
            'id' => $id,
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
