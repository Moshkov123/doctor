<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $records = Record::all();
        return view('admin', compact('records'));
    }
    public function updateStatus(Request $request, $id)
    {
        // Находим запись по ID
        $record = Record::findOrFail($id);

        // Обновляем статус на 1 (выполнен)
        $record->status = 1;
        $record->save();

        // Возвращаем пользователя обратно с сообщением об успехе
        return redirect()->back()->with('success', 'Статус записи успешно обновлен.');
    }
}