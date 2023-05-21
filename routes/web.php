<?php

use Illuminate\Support\Facades\Route;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
Use App\Models\Tasks;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/




Route::get('/tasks',[TaskController::class, 'showTask']);

Route::post('/tasks', [TaskController::class,'addTask']);

Route::get('/completed/{task}', [TaskController::class,'checkbox']);

Route::get('/task/{task}', [TaskController::class,'deleteTask']);

Route::get('/update/{task}', [TaskController::class,'updateTask']);

Route::post('/update/{task}', [TaskController::class,'updateTask']);

