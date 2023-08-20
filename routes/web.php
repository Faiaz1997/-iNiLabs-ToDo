<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',        
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    Route::get('/',[TodoController::class,'index'])->name('home');
    Route::post('/add-task',[TodoController::class,'addTask'])->name('add.task');
    Route::post('/expired-tasks',[TodoController::class,'expiredTasks'])->name('expired.tasks');
    Route::get('/task-edit/{id}',[TodoController::class,'taskEdit'])->name('task.edit');
    Route::post('/update-task',[TodoController::class,'updateTask'])->name('update.task');
    Route::post('/delete-task',[TodoController::class,'deleteTask'])->name('delete.task');
    

});
