<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function findAll()
    {
        $todos = Todo::where('user_id', \auth()->user()->id)->get();
        return view('list', [
            'todos' => $todos,
            'active' => 'todolist'
        ]);
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->back()->with('success', 'Todo has been deleted');
    }
}
