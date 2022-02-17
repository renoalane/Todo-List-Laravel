<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::where('user_id', \auth()->user()->id)->orderBy('completed')->whereDate('created_at', Carbon::today()->toDateString())->orderBy('completed', 'desc')->get();
        return view('index', [
            'todos' => $todos,
            'active' => 'todo'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        $validateData['user_id'] = \auth()->user()->id;
        Todo::create($validateData);

        return redirect()
            ->back()
            ->with('success', 'New to-do created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        if ($todo->user_id !== \auth()->user()->id) {
            \abort(403);
        }

        return view('edit', [
            'todo' => $todo,
            'active' => 'todo'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        $todo->update($validateData);

        return \redirect()->route('todo')->with('success', 'Todo has been updated');
    }

    public function completed(Todo $todo)
    {
        if ($todo->completed === 0) {
            $todo->update(['completed' => 1, 'completed_at' => Carbon::now()]);
            return \redirect()->back()->with('success', 'TODO marked as completed');
        } else {
            $todo->update(['completed' => 0, 'completed_at' => Carbon::now()]);
            return \redirect()->back()->with('success', 'TODO marked as uncompleted');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todo')->with('success', 'Todo has been deleted');
    }
}
