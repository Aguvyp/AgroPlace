<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;


use Illuminate\Validation\ValidationException;

class RepliesController extends Controller
{
    //
    public function create($tweet, Request $request) {
        return view('replies.create', [
            'reply' => "",
            'tweet_id' => $tweet
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'reply' => ['required', 'min:4', 'max:140']
        ]);

        //Creamos el modelo
        $new_reply = new Reply; //Creamos nuevo modelo de la clase Http/Models/Reply
        $new_reply->message = $validated['reply'];

        //Accedemos al tweet_id desde los parametros de la URL
        $tweet_id = (int) $request->input('tweet_id');

        //Asignamos el tweet_id
        $new_reply->tweet_id = $tweet_id;

        //Asignamos el user_id del usuario autenticado
        $new_reply->user_id = auth()->user()->id;

        //Guardamos el modelo
        $new_reply->save(); //Lo guarda en la base de datos

        return redirect()->route('tweets');
    }
}
