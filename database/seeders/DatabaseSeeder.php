<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        $this->call(PermissionRoleSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(ServiceSeed::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(ConfigSeeder::class);
        \App\Models\Client::factory(30)->create();
    }
}
