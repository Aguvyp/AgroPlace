<?php



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TweetSeeder;
use Database\Seeders\ReplySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
            $$this->call([
            UserSeeder::class,
            TweetSeeder::class,
            ReplySeeder::class,
        ]);

    }
}
