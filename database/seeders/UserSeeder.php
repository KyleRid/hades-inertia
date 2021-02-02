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
        DB::table('users')->insert([
            'name' => 'Kyle',
            'email' => 'kylerid@yandex.ru',
            'password' => bcrypt('Test123!'),
            'role_id' => 1,
            'currency' => 3,
        ]);
    }
}
