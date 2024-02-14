<?php

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

Route::put('/todos/{id}', [App\Http\Controllers\TodoController::class, 'update']);
Route::put('/todos/{id}/check', [App\Http\Controllers\TodoController::class, 'check']);
Route::delete('/todos/{id}/delete', [App\Http\Controllers\TodoController::class, 'delete']);
Route::get('/todos/{id}/edit', [App\Http\Controllers\TodoController::class, 'edit']);
Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index']);
Route::get('/todos/create', [App\Http\Controllers\TodoController::class, 'create']);
Route::post('/todos', [App\Http\Controllers\TodoController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
