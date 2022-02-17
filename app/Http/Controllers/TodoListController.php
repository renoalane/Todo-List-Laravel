<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function findAll()
    {
        $todos = Todo::all();
        return view('list', [
            'todos' => $todos,
            'active' => 'todolist'
        ]);
    }
}
