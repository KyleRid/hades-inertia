<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
                [
                    'option_name' => 'siteName',
                    'option_value' => 'Hades Demo Site',
                ],
                [
                    'option_name' => 'siteDescription',
                    'option_value' => 'Hades Description',
                ],
                [
                    'option_name' => 'siteTitle',
                    'option_value' => 'Hades Description',
                ],
                [
                    'option_name' => 'allowRegistration',
                    'option_value' => '1',
                ],
                [
                    'option_name' => 'allowLogin',
                    'option_value' => '1',
                ],
                [
                    'option_name' => 'maintenanceMode',
                    'option_value' => '0',
                ],
                [
                    'option_name' => 'adminEmail',
                    'option_value' => 'nelsonbh@yandex.ru',
                ],
        ]);
    }
}
