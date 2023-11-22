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

Route::get('/', function ()
{
    return view('index'); //View es el helper
});

//Cuando te pidan /tweets derivale a este controlador "TweetsController" y al metodo "Index"
Route::get('/tweets', [
    App\Http\Controllers\TweetsController::class, 'index'
])->name('tweets');


Route::get('/tweets/create', [
    App\Http\Controllers\TweetsController::class, 'create'
])->name('tweets.create');

Route::post('/tweets', [
    App\Http\Controllers\TweetsController::class, 'store'
])->name('tweets.store');

//Edicion
Route::get('/tweets/edit/{tweet}', [
    App\Http\Controllers\TweetsController::class, 'edit'
])->name('tweets.edit');


Route::put('/tweets/{tweet}', [
    App\Http\Controllers\TweetsController::class, 'update'
])->name('tweets.update');

 // Metodo para elimianr los tweets
Route::delete('tweets/{tweet}', [
    App\Http\Controllers\TweetsController::class, 'destroy'
])->name('tweets.destroy');

// vista de confimación para BORRAR tweets (recibiendo el modelo que necesito {tweet})
Route::get('/tweets/delete/{tweet}', [
    App\Http\Controllers\TweetsController::class, 'delete'
])->name('tweets.delete');




