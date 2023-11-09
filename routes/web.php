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
