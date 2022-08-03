<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Fornecedor;
use App\Models\User;
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
        \App\Models\Fornecedor::factory(10)->create();
        \App\Models\Agencia::factory(1)->create();

        User::factory()->create([
            'name' => 'Adilson',
            'email' => 'adilsonmoraes.ams@gmail.com',
            'password' => Hash::make('12345678'),
        ]);


    }
}
