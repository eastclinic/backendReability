<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(1)->create();

         \App\Models\User::factory()->create([
             'name' => 'jeromwork',
             'email' => 'jeromwork@inbox.ru',
             'password' => '$2y$10$7ROtriIPUPLIRNsvJkGiBuI4aj7A8x0AqJOEUCmDROC1Nah9QWScS',
         ]);
    }
}
