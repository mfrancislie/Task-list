<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function() {
    return redirect()->route('tasks.index');
});

// latest()->get(). you will get the most recent task first
// SQL queries in an object oriented way.
// App\Models\Task::all()->latest()where('completed, true')->get(). you will get all tasks completed 
// cmd: php artisan tinker is lets you write queries.
// cmd: php artisan route:list. show all the routes list
// cmd: php artisan make:request. to create http request file

// fetching all the data from the database
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
        ]);
})->name('tasks.index');


//route to create new task
Route::view('/tasks/create', 'create')->name('tasks.create');


// to render a single task
Route::get('/tasks/{task}', function (Task $task) { 
    return view('singletask', ['task' => $task]);
})->name('tasks.singletask');



// get the id to update the data
Route::get('/tasks/{task}/edit', function (Task $task) { 
    return view('edit', ['task' => $task]);
})->name('tasks.edit');


// To create new task
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.singletask', ['task' => $task->id])
    ->with('success', 'Task created successfully!');;
})->name('tasks.store');



// To Update the data
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('tasks.singletask', ['task' => $task->id])
    ->with('success', 'Task updated successfully!');;
})->name('tasks.updated');

// delete the data
Route::delete('/tasks/{task}', function(Task $task){
  $task->delete();

  return redirect()->route('tasks.index', ['task' => $task->id])
  ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');