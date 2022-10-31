<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * APP
         */
        $config = new Config();
        $config->type = 'app';
        $config->slug = 'theme';
        $config->value = 'wave-light';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'locale';
        $config->value = 'en';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'currency';
        $config->value = 'PLN';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'dbbuild';
        $config->value = date('YmdHi', time());
        $config->save();
        /**
         * END APP
         */
        /**
         * MODULES
         */
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'calendar';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'tasks';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'clients';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'products';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'loyalties';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'company';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'analytics';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->slug = 'finances';
        $config->type = 'modules';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'tags';
        $config->value = '1';
        $config->save();
        $config = new Config();
        $config->type = 'modules';
        $config->slug = 'services';
        $config->value = '1';
        $config->save();
        /**
         * END MODULES
         */
    }
}
