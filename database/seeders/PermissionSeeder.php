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
        $readClient->name = 'Read clients';
        $readClient->slug = 'read-clients';
        $readClient->save();

        $writeClient = new Permission();
        $writeClient->name = 'Write clients';
        $writeClient->slug = 'write-clients';
        $writeClient->save();

        $createClient = new Permission();
        $createClient->name = 'Create clients';
        $createClient->slug = 'create-clients';
        $createClient->save();

        $deleteClient = new Permission();
        $deleteClient->name = 'Delete clients';
        $deleteClient->slug = 'delete-clients';
        $deleteClient->save();

        $readuser = new Permission();
        $readuser->name = 'Read users';
        $readuser->slug = 'read-users';
        $readuser->save();

        $writeuser = new Permission();
        $writeuser->name = 'Write users';
        $writeuser->slug = 'write-users';
        $writeuser->save();

        $createuser = new Permission();
        $createuser->name = 'Create users';
        $createuser->slug = 'create-users';
        $createuser->save();

        $deleteuser = new Permission();
        $deleteuser->name = 'Delete users';
        $deleteuser->slug = 'delete-users';
        $deleteuser->save();

        $readproduct = new Permission();
        $readproduct->name = 'Read products';
        $readproduct->slug = 'read-products';
        $readproduct->save();

        $writeproduct = new Permission();
        $writeproduct->name = 'Write products';
        $writeproduct->slug = 'write-products';
        $writeproduct->save();

        $createproduct = new Permission();
        $createproduct->name = 'Create products';
        $createproduct->slug = 'create-products';
        $createproduct->save();

        $deleteproduct = new Permission();
        $deleteproduct->name = 'Delete products';
        $deleteproduct->slug = 'delete-products';
        $deleteproduct->save();


        $manageBusiness = new Permission();
        $manageBusiness->name = 'Manage Business';
        $manageBusiness->slug = 'manage-business';
        $manageBusiness->save();
        $manageBusiness = new Permission();
        $manageBusiness->name = 'Manage Loyalties';
        $manageBusiness->slug = 'manage-loyalties';
        $manageBusiness->save();
    }
}
