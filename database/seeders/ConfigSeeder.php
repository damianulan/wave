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
        $config->default = 'wave-light';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'locale';
        $config->value = 'en';
        $config->default = 'en';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'currency';
        $config->value = 'PLN';
        $config->default = 'EUR';
        $config->save();

        $config = new Config();
        $config->type = 'loyalties';
        $config->slug = 'auto_loyalty_program';
        $config->value = '1';
        $config->save();

        $config = new Config();
        $config->type = 'notifications';
        $config->slug = 'notify_on_new_clients';
        $config->value = '1';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'build';
        $config->value = date('YmdHi', time());
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'avatarmale';
        $config->value = 'images/portrait/small/avatar-male.png';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'avatarfemale';
        $config->value = 'images/portrait/small/avatar-female.png';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'site_name';
        $config->value = 'Wave';
        $config->default = 'Wave';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'site_description';
        $config->value = '';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'site_logo';
        $config->value = '/images/logo/png/wave-logo-color-box.png';
        $config->default = '/images/logo/png/wave-logo-color-box.png';

        $config->save();
        $config = new Config();
        $config->type = 'app';
        $config->slug = 'site_robots';
        $config->value = 'nofollow';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'site_mail';
        $config->value = 'kontakt@damianulan.me';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'license_key';
        $config->value = 'XXXX-YYYY-XXXX';
        $config->save();

        $config = new Config();
        $config->type = 'app';
        $config->slug = 'support_mail';
        $config->value = 'wave@damianulan.me';
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
