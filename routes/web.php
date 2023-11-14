<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/todo', [\App\Http\Controllers\TodosController::class, 'index'])->name('todo.index');
    Route::get('/todo/create', [\App\Http\Controllers\TodosController::class, 'create']);
    Route::post('/todo/create', [\App\Http\Controllers\TodosController::class, 'store']);
    Route::get('/todo/show', [\App\Http\Controllers\TodosController::class, 'show'])->name('todo.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
