<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // para generar 10 usuarios aleatorios
        User::factory(10)->create();
    }
}
