<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Exception;

class TweetsController extends Controller
{
    //Definimos metodo
    public function index()
    {
        //Recuperar todos los tweets
        $tweets = Tweet::with(['replies.user', 'user'])->orderBy('created_at', 'DESC')->get(); //Me trae todos los tweets y las respuestas


        //Recupera variable de session
        $notify_tweet_published = session()->get('notify_tweet_published', false);
        $notify_tweet_updated = session()->get('notify_tweet_updated', false);
        $notify_tweet_deleted = session()->get('notify_tweet_deleted', false);

        //Pasarlos a la vista ppara que los muestre por pantalla
        return view('tweets/index', [
            'tweets' => $tweets,
            'notify_tweet_published' => $notify_tweet_published,
            'notify_tweet_updated' => $notify_tweet_updated,
            'notify_tweet_deleted' => $notify_tweet_deleted
        ]); //En la carpeta vistas busque tweets y levante el index
            //Primer parametro archivo de vista y el segundo el array que quiero mostrar
    }

    //Definimos metodo para recuperar la vista create
    public function create()
    {
        return view('tweets.create', [
            'tweet'=>''
        ]);
    }

    //Definimose el metodo para el post
    public function store(Request $request)
    {

        //Validation...
        $validate = $request->validate([
            'tweet' => ['required','max:30', 'min:4']
        ]);


        //Creamos el modelo...
        $new_tweet = new Tweet; //Creamos nuevo modelo de la clase Http/Models/Tweet
        $new_tweet->message = $validate['tweet'];
        $new_tweet->user_id = auth()->user()->id;

        //... y lo guardamos
        $new_tweet->save(); //Ejecuto la funcion guardar tweet

        //Registro el evento que sucedio: "publique un tweet"
        session()->flash('notify_tweet_published', true);

        return redirect()->route('tweets');
    }

    public function edit(Tweet $tweet, Request $request)
    {

        return view('tweets.edit', [
            'tweet' => $tweet
        ]);
    }


    public function update(Tweet $tweet, Request $request)
    {
        $validated = $request->validate([
            'tweet' => ['required', 'min:4', 'max:30'],
        ]);


        $tweet->message = $validated['tweet'];
        $tweet->save();

        session()->flash('notify_tweet_updated', true);

        return redirect()->route('tweets');
    }

    public function destroy(Tweet $tweet, Request $request)
    {
        $tweet->delete();

        session()->flash('notify_tweet_deleted', true);

        return redirect()->route('tweets');
    }

    public function delete(Tweet $tweet)
    {
        return view('tweets.delete', [
            'tweet' => $tweet
        ]);
    }

}
