<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\AuthController\RegisterController;
use App\Http\Controllers\TodoListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autenticate'])->name('login.autenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    // Todo
    Route::get('/todos', [TodoController::class, 'index'])->name('todo');
    Route::post('/todos', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/{todo}/completed', [TodoController::class, 'completed'])->name('todo.completed');
    Route::get('/todos/{todo}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);

    // TodoList
    Route::get('/todolist', [TodoListController::class, 'findAll'])->name('todolist');
    Route::delete('/todolist/{todo}', [TodoListController::class, 'destroy'])->name('todolist.destroy');
});
