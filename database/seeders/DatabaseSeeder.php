<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('roles')->insert([
            ['name' => 'agente', 'display_name' => 'Agente'],
            ['name' => 'administrador', 'display_name' => 'Administrador'],
            ['name' => 'supervisor', 'display_name' => 'Supervisor'],
            ['name' => 'usuario', 'display_name' => 'Usuario Clínica'],
        ]);

        DB::table('users')->insert([
            ['name_complete' => 'admin',
                'rut' => 'A00000',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$XdPypI2Bjr1KVjz6Y0MKZ.vb4QCgSmRgOu2iryyXzgZtaBnlmhIUS'
            ]
        ]);

        DB::table('role_user')->insert([
            ['role_id' => 2, 'user_id' => 1, 'user_type' => 'App\Models\User'],
        ]);
    }
}
