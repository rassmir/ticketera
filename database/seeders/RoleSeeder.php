<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'agente', 'display_name' => 'Agente'],
            ['name' => 'administrador', 'display_name' => 'Administrador'],
            ['name' => 'supervisor', 'display_name' => 'Supervisor'],
            ['name' => 'usuario', 'display_name' => 'Usuario Clínica'],
        ]);
    }
}
