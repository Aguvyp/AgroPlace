<?php
use illuminate\support\Facades\Route;
use App\Http\Controllers\RepliesController;

Route::get('/tweets', [
    App\Http\Controllers\TweetsController::class, 'index'
])->name('tweets');

Route::middleware('auth')->group(function()
{
    Route::get('/tweets/create', [
        App\Http\Controllers\TweetsController::class, 'create'
    ])
    ->name('tweets.create');

    Route::post('/tweets', [
        App\Http\Controllers\TweetsController::class, 'store'
    ])
    ->name('tweets.store');

    //Edicion
    Route::get('/tweets/edit/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'edit'
    ])
    ->name('tweets.edit');


    Route::put('/tweets/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'update'
    ])->name('tweets.update');


    Route::delete('tweets/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'destroy'
    ])->name('tweets.destroy');


    Route::get('/tweets/delete/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'delete'
    ])->name('tweets.delete');


 //SECCION DE RESPUESTAS

    Route::get('/tweets/{tweet}/reply/create', [
        App\Http\Controllers\RepliesController::class, 'create'
    ])->name('replies.create');


    Route::post('/tweets/{tweet}/reply/store', [
        App\Http\Controllers\RepliesController::class, 'store'
    ])->name('replies.store');


    Route::get('/replies/edit/{reply}', [
        App\Http\Controllers\RepliesController::class, 'edit'
    ])->name('replies.edit');


    Route::put('/replies/{reply}', [
        App\Http\Controllers\RepliesController::class, 'update'
    ])->name('replies.update');


    Route::get('/replies/delete/{reply}', [
        App\Http\Controllers\RepliesController::class, 'delete'
    ])->name('replies.delete');


    Route::delete('/replies/{reply}', [
        App\Http\Controllers\RepliesController::class, 'destroy'
    ])->name('replies.destroy');
});


