<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $readClient = new Permission();
        $readClient->name = 'View clients';
        $readClient->slug = 'clients/view';
        $readClient->save();

        $writeClient = new Permission();
        $writeClient->name = 'Edit clients';
        $writeClient->slug = 'clients/edit';
        $writeClient->save();

        $createClient = new Permission();
        $createClient->name = 'Create clients';
        $createClient->slug = 'clients/create';
        $createClient->save();

        $deleteClient = new Permission();
        $deleteClient->name = 'Delete clients';
        $deleteClient->slug = 'clients/delete';
        $deleteClient->save();

        $readuser = new Permission();
        $readuser->name = 'View users';
        $readuser->slug = 'users/view';
        $readuser->save();

        $writeuser = new Permission();
        $writeuser->name = 'Edit users';
        $writeuser->slug = 'users/edit';
        $writeuser->save();

        $createuser = new Permission();
        $createuser->name = 'Create users';
        $createuser->slug = 'users/create';
        $createuser->save();

        $deleteuser = new Permission();
        $deleteuser->name = 'Delete users';
        $deleteuser->slug = 'users/delete';
        $deleteuser->save();

        $manageBusiness = new Permission();
        $manageBusiness->name = 'Manage Business';
        $manageBusiness->slug = 'business/manage';
        $manageBusiness->save();
    }
}
