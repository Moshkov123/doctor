<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::whereIn('type', [1, 2, 3])->get();

        // Передаем данные в представление
        return view('appointment', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'datetime' => 'required|date',
            'doctor_id' => 'required|exists:users,id',
        ]);
    
        $user = Auth::user();
    
        // Проверяем, что пользователь имеет тип 4 и его id не совпадает с id врача
        if ($user->type === 4 && $user->id != $request->doctor_id) {
            // Проверяем, есть ли уже запись к этому врачу на указанное время
            $existingRecord = Record::where('doctors_id', $request->doctor_id)
                ->where('data', $request->datetime)
                ->exists();
    
            if ($existingRecord) {
                return redirect()->back()
                    ->with('error', 'На это время уже есть запись к этому врачу.');
            }
    
            // Создаем запись
            Record::create([
                'data' => $request->datetime,
                'users_id' => $user->id,
                'doctors_id' => $request->doctor_id,
                'status' => 0, 
            ]);
    
            return redirect()->route('dashboard')
                ->with('success', 'Запись успешно создана!');
        } else {
            return redirect()->back()
                ->with('error', 'Вы не можете записаться к этому врачу.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = User::findOrFail($request ->id); 
        return view("record", compact("user")); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        //
    }
}
