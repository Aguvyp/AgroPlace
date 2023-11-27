<?php
use illuminate\support\Facades\Route;

Route::get('/tweets', [
    App\Http\Controllers\TweetsController::class, 'index'
])->name('tweets');

Route::middleware('auth')->group(function()
{
    Route::get('/tweets/{tweet}/reply/create', [
        App\Http\Controllers\RepliesController::class, 'create'
    ])->name('reply.create');

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

     // Metodo para elimianr los tweets
    Route::delete('tweets/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'destroy'
    ])->name('tweets.destroy');

    // vista de confimación para BORRAR tweets (recibiendo el modelo que necesito {tweet})
    Route::get('/tweets/delete/{tweet}', [
        App\Http\Controllers\TweetsController::class, 'delete'
    ])->name('tweets.delete');
});


