<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
            [
                'name' => 'Kyle',
                'email' => 'kylerid@gmail.ru',
                'password' => bcrypt('Test123!'),
                'role_id' => 1,
                'currency' => 3,
                'login' => 'test_login',
                'gender' => true,
                'verified' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Neal',
                'email' => 'nealdk@gmail.ru',
                'password' => bcrypt('Test123!'),
                'role_id' => 1,
                'currency' => 3,
                'login' => 'test_login1',
                'gender' => true,
                'verified' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Brane',
                'email' => 'branerid@yandex.ru',
                'password' => bcrypt('Test123!'),
                'role_id' => 1,
                'currency' => 3,
                'login' => 'test_login2',
                'gender' => true,
                'verified' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Nelson',
                'email' => 'nelsonrid@yandex.ru',
                'password' => bcrypt('Test123!'),
                'role_id' => 1,
                'currency' => 3,
                'login' => 'test_login3',
                'gender' => true,
                'verified' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
