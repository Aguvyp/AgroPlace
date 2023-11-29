<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\Tweet;

class ReplySeeder extends Seeder
{
    public function run()
    {
        // Obtener algunos tweets existentes
        $tweets = Tweet::all();

        // Crear respuestas aleatorias para cada tweet
        $tweets->each(function ($tweet) {
            Reply::factory(rand(1, 5))->create(['tweet_id' => $tweet->id]);
        });
    }
}
