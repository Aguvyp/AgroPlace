<?php

namespace Database\Factories;

use App\Models\Reply;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => fake()->text(),
            'user_id' => User::all()->random()->id,
            'tweet_id' => Tweet::all()->random()->id,
        ];
    }
}
