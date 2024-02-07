<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

// fetching all the data from the database
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => App\Models\Task::latest()->get()
        ]);
})->name('tasks.index');

Route::view('/tasks/{create}', 'create')->name('tasks.create');

// to render a single task
Route::get('/tasks/{id}', function ($id) { 
    return view('singletask', ['task' => App\Models\Task::findOrFail($id)]);
})->name('tasks.singletask');


Route::post('/tasks', function(Request $request){
//    dd('we have reached the store route'); for testing
dd($request->all());
})->name('tasks.store');