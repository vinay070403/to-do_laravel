<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('tasks', ['tasks' => \App\Models\Task::all()]);
});

Route::post('/tasks', function (Request $request) {

    $request->validate([
        'title' => 'required|min:2|max:255',
    ]);

     \App\Models\Task::create([
        'title' => $request->title
    ]);

    return redirect('/')->with('added');
});

Route::delete('/tasks/{task}', function (\App\Models\Task $task) {
    $task->delete();
    return redirect('/');
});

Route::get('tasks/{task}/edit', function (\App\Models\Task $task) {
    return view('edit', ['task' => $task]);
});

Route::put('tasks/{task}', function (\Illuminate\Http\Request $request, \App\Models\Task $task) {
    $request->validate(['title' => 'required']);
    $task->update(['title' => $request->title]);
    return redirect('/')->with('success', 'Task is updated');
});


