<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetsController extends Controller
{
    //Definimos metodo
    public function index()
    {
        //Recuperar todos los tweets
        $tweets = Tweet::orderBy('created_at', 'DESC')->get(); //Me trae todos los tweets de la tabla

        //Pasarlos a la vista ppara que los muestre por pantalla
        return view('tweets/index', [
            'tweets' => $tweets
        ]); //En la carpeta vistas busque tweets y levante el index
            //Primer parametro archivo de vista y el segundo el array que quiero mostrar
    }

    //Definimos metodo para recuperar la vista create
    public function create()
    {
        return view('tweets.create');
    }

    //Definimose el metodo para el post
    public function store(Request $request)
    {

        //Validation...
        $validate = $request->validate([
            'tweet' => ['required','max:30', 'min:4'],
            'name' => ['required','max:15', 'min:3']
        ]);


        //Creamos el modelo...
        $new_tweet = new Tweet; //Creamos nuevo modelo de la clase Http/Models/Tweet
        $new_tweet->message = $validate['tweet'];
        $new_tweet->autor = $validate['name'];

        //... y lo guardamos
        $new_tweet->save(); //Ejecuto la funcion guardar tweet

        return redirect()->route('tweets');

    }

}
