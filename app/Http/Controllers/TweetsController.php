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
        $tweet = $request ->input('tweet');
        //Validation laravel.basic.request

        //Almacenar / persistir
        //Conectarme a DB
        //Generar consulta
        //Ejecutar la consulta
        //Validar que la consulta se haya realizado
        //Desconectarme a DB

        $new_tweet = new Tweet; //Creamos nuevo modelo de la clase Http/Models/Tweet
        $new_tweet->message = $tweet; //Asigno la variable que contiene mi tweet al campo message de la DB
        $new_tweet->save(); //Ejecuto la funcion guardar tweet

        return redirect()->route('tweets');

    }

}
