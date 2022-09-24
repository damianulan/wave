<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service1 = new Service();
        $service1->name = 'Strzyżenie Damskie';
        $service1->price = null;
        $service1->price_short_min = 45.00;
        $service1->price_short_max = 70.00;
        $service1->price_medium_min = 50.00;
        $service1->price_medium_max = 90.00;
        $service1->price_long_min = 45.00;
        $service1->price_long_max = 120.00;
        $service1->time = 90;
        $service1->gender = '0';
        $service1->description = 'Proste podcięcie włosów';
        $service1->added_by = null;
        $service1->save();

        $service2 = new Service();
        $service2->name = 'Grzywka';
        $service2->price = 15.00;
        $service2->price_short_min = null;
        $service2->price_short_max = null;
        $service2->price_medium_min = null;
        $service2->price_medium_max = null;
        $service2->price_long_min = null;
        $service2->price_long_max = null;
        $service2->time = 30;
        $service2->gender = '0';
        $service2->description = 'Proste podcięcie grzywki';
        $service2->added_by = null;
        $service2->save();

        $service2 = new Service();
        $service2->name = 'Strzyżenie';
        $service2->price = 30.00;
        $service2->price_short_min = null;
        $service2->price_short_max = null;
        $service2->price_medium_min = null;
        $service2->price_medium_max = null;
        $service2->price_long_min = null;
        $service2->price_long_max = null;
        $service2->time = 30;
        $service2->gender = '1';
        $service2->description = 'Proste strzyżenie';
        $service2->added_by = null;
        $service2->save();
    }

}
