<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.manual')->group(function () {
    Route::resource('todo_lists', TodoListController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo_lists', [App\Http\Controllers\TodoListController::class, 'index'])
->name('todo_lists.index');

Route::get('/todo_lists/create', [App\Http\Controllers\TodoListController::class, 'create'])
->name('todo_lists.create');

Route::post('/todo_lists', [App\Http\Controllers\TodoListController::class, 'store'])
->name('todo_lists.store');

Route::get('/todo_lists/{todoList}', [App\Http\Controllers\TodoListController::class, 'show'])
->name('todo_lists.show');

Route::get('/todo_lists/{todoList}/edit', [App\Http\Controllers\TodoListController::class, 'edit'])
->name('todo_lists.edit');

Route::put('/todo_lists/{todoList}', [App\Http\Controllers\TodoListController::class, 'update'])
->name('todo_lists.update');

Route::delete('/todo_lists/{todoList}', [App\Http\Controllers\TodoListController::class, 'destroy'])
->name('todo_lists.destroy');

Route::get('/todo_lists/{todoList}/complete', [App\Http\Controllers\TodoListController::class, 'complete'])
->name('todo_lists.complete');

Route::get('/todo_lists/{todoList}/incomplete', [App\Http\Controllers\TodoListController::class, 'incomplete'])
->name('todo_lists.incomplete');

Route::get('/todo_lists/{todoList}/delete', [App\Http\Controllers\TodoListController::class, 'delete'])
->name('todo_lists.delete');

Route::get('/todo_lists/{todoList}/restore', [App\Http\Controllers\TodoListController::class, 'restore'])
->name('todo_lists.restore');

Route::get('/todo_lists/{todoList}/forceDelete', [App\Http\Controllers\TodoListController::class, 'forceDelete'])
->name('todo_lists.forceDelete');

Route::get('/todo_lists/{todoList}/softDelete', [App\Http\Controllers\TodoListController::class, 'softDelete'])
->name('todo_lists.softDelete');

Route::get('/todo_lists/{todoList}/restoreAll', [App\Http\Controllers\TodoListController::class, 'restoreAll'])
->name('todo_lists.restoreAll');

Route::get('/todo_lists/{todoList}/forceDeleteAll', [App\Http\Controllers\TodoListController::class, 'forceDeleteAll'])
->name('todo_lists.forceDeleteAll');

Route::get('/todo_lists/{todoList}/softDeleteAll', [App\Http\Controllers\TodoListController::class, 'softDeleteAll'])
->name('todo_lists.softDeleteAll');

Route::get('/todo_lists/{todoList}/restoreAllTrashed', [App\Http\Controllers\TodoListController::class, 'restoreAllTrashed'])
->name('todo_lists.restoreAllTrashed');

Route::get('/todo_lists/{todoList}/forceDeleteAllTrashed', [App\Http\Controllers\TodoListController::class, 'forceDeleteAllTrashed'])
->name('todo_lists.forceDeleteAllTrashed');

Route::get('/todo_lists/{todoList}/softDeleteAllTrashed', [App\Http\Controllers\TodoListController::class, 'softDeleteAllTrashed'])
->name('todo_lists.softDeleteAllTrashed');


Route::resource('users', UserController::class);
Route::resource('todo_lists', TodoListController::class);
