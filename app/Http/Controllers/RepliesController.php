<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Tweet;


use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\text;

class RepliesController extends Controller
{

    public function create($tweet) {

        $tweet_model = Tweet::find($tweet);
        $tweet_message = $tweet_model->message;

        return view('replies.create', [
            'reply' => "",
            'tweet_id' => $tweet,
            'tweet_message' => $tweet_message

        ]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'reply' => ['required', 'min:4', 'max:140']
        ]);

        //Creamos el modelo
        $new_reply = new Reply;
        $new_reply->message = $validated['reply'];

        //Accedemos al tweet_id desde los parametros de la URL
        $tweet_id = (int) $request->input('tweet_id');
        $new_reply->tweet_id = $tweet_id;

        //Asignamos el user_id del usuario autenticado
        $new_reply->user_id = auth()->user()->id;

        //Guardamos el modelo
        $new_reply->save(); //Lo guarda en la base de datos

        session()->flash('notify_reply_published', true);

        return redirect()->route('tweets');
    }

    public function edit(Reply $reply)
    {
        // Cargar la relación 'tweet'
        /* $reply->load('tweets'); */

        return view('replies.edit', [
            'reply' => $reply
        ]);
    }

    public function update(Reply $reply, Request $request)
    {
        $validated = $request->validate([
            'reply' => ['required', 'min:4', 'max:30'],
        ]);


        $reply->message = $validated['reply'];
        $reply->save();

        session()->flash('notify_reply_updated', true);

        return redirect()->route('tweets');
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();

        session()->flash('notify_reply_deleted', true);

        return redirect()->route('tweets');
    }

    public function delete(Reply $reply)
    {
        return view('replies.delete', [
            'reply' => $reply
        ]);
    }
}
