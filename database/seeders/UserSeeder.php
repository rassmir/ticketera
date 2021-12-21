<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ::table('users')->insert([
               ['name_complete' => 'admin',
                'rut' => 'A00000',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$XdPypI2Bjr1KVjz6Y0MKZ.vb4QCgSmRgOu2iryyXzgZtaBnlmhIUS'
            ]
        ]);
    }
}
