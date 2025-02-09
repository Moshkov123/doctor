<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
      return view('register');
    }

    public function store(Request  $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            // Если email уже существует, возвращаем ошибку
            return back()->withErrors(['email' => 'Такой email уже зарегистрирован.'])->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
            'type' => 4,
        ]);


        return redirect('/')->with('success', 'Регистрация прошла успешно!');
    }
}
