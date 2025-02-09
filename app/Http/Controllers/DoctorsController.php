<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index(){
        $users = User::whereIn('type', [1, 2, 3])->get();

        // Передаем данные в представление
        return view('appointment', compact('users'));
    }
}
