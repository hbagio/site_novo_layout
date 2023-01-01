<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name'     => 'Usuario',
            'email'    => 'usuario@email.com',
            'password' => bcrypt('usu4r10')
        ]);
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Hueliton Bagio',
            'email' => 'bagiohn@gmail.com',
            'password' => bcrypt('1234567')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Vanusa Petry',
            'email' => 'vanusapetry@hotmail.com',
            'password' => bcrypt('1234567')
        ]);
    }
}
