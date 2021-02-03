<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_campaigns')->insert([
            [
                'template' => 'default',
                'interval' => 'day',
                'sender' => 'admin@admin.com',
            ],
            [
                'template' => 'promo',
                'email' => 'month',
                'sender' => 'admin@admin.com',
            ]
        ]);
    }
}
