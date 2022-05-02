<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Todo List project--------------------------------------------------------------------------------------------------
Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/create', [TodoController::class, 'create']);
Route::post('/todos/create', [TodoController::class, 'store']);
Route::get('/todos/{id}/edit', [TodoController::class, 'edit']); //dynamic routing e.g id
Route::patch('/todos/{id}/update', [TodoController::class, 'update']); //patch (with the previous TodoCreateRequest validation)
Route::put('/todos/{id}/complete', [TodoController::class, 'complete']);
Route::delete('/todos/{id}/incomplete', [TodoController::class, 'incomplete']);
Route::delete('/todos/{id}/delete', [TodoController::class, 'delete']);