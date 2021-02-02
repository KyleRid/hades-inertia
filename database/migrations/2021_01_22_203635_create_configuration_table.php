<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('configurations');
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('option_id');
            $table->string('option_name', 64)->unique();
            $table->longText('option_value');
            $table->string('autoload', 20)->default('yes');
        });

        // DB::table('configurations')->insert(
            // [
                // [
                //     'option_name' => 'siteName',
                //     'option_value' => 'Hades Demo Site',
                // ],
                // [
                //     'option_name' => 'siteDescription',
                //     'option_value' => 'Hades Description',
                // ],
                // [
                //     'option_name' => 'siteTitle',
                //     'option_value' => 'Hades Description',
                // ],
                // [
                //     'option_name' => 'allowRegistration',
                //     'option_value' => '1',
                // ],
                // [
                //     'option_name' => 'allowLogin',
                //     'option_value' => '1',
                // ],
                // [
                //     'option_name' => 'maintenanceMode',
                //     'option_value' => '0',
                // ],
                // [
                //     'option_name' => 'adminEmail',
                //     'option_value' => 'nelsonbh@yandex.ru',
                // ],

            // ]
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
