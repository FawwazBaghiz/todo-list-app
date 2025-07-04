<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index()
    {
        $todoLists = TodoList::where('user_id', session('user_id'))->get();
        return view('todo_lists.index', compact('todoLists'));
    }

    public function create()
    {
        return view('todo_lists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        TodoList::create([
            'user_id' => session('user_id'),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('todo_lists.index')->with('success', 'Todo list created successfully.');
    }

    public function show(TodoList $todoList)
    {
        if ($todoList->user_id != session('user_id')) {
            abort(403, 'Tidak diizinkan');
        }

        return view('todo_lists.show', compact('todoList'));
    }

    public function edit(TodoList $todoList)
    {
        if ($todoList->user_id != session('user_id')) {
            abort(403, 'Tidak diizinkan');
        }

        return view('todo_lists.edit', compact('todoList'));
    }

    public function update(Request $request, TodoList $todoList)
    {
        if ($todoList->user_id != session('user_id')) {
            abort(403, 'Tidak diizinkan');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $todoList->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('todo_lists.index')->with('success', 'Todo list updated successfully.');
    }

    public function destroy(TodoList $todoList)
    {
        if ($todoList->user_id != session('user_id')) {
            abort(403, 'Tidak diizinkan');
        }

        $todoList->delete();
        return redirect()->route('todo_lists.index')->with('success', 'Todo list deleted.');
    }
}
