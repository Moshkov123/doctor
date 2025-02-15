<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = auth()->user();
       if($user->type === 4){
        $records = Record::where('users_id', $user->id)
        ->with('doctor') // Загружаем связанные данные о враче
        ->get();
       }else{
        $records = Record::where('doctors_id', $user->id)
        ->with('user') // Загружаем связанные данные о враче
        ->get();
       }
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;

        return view('dashboard', [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'records' => $records,
            'userType' => $user->type,
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
