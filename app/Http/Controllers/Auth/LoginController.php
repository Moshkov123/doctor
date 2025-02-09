<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            if (auth()->user()->type != 1) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('admin');
            }
        
        }

        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ]);
    }
}