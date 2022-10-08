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
        $readClient->slug = 'clients-view';
        $readClient->save();

        $writeClient = new Permission();
        $writeClient->name = 'Edit clients';
        $writeClient->slug = 'clients-edit';
        $writeClient->save();

        $createClient = new Permission();
        $createClient->name = 'Create clients';
        $createClient->slug = 'clients-create';
        $createClient->save();

        $deleteClient = new Permission();
        $deleteClient->name = 'Delete clients';
        $deleteClient->slug = 'clients-delete';
        $deleteClient->save();

        $readuser = new Permission();
        $readuser->name = 'View users';
        $readuser->slug = 'users-view';
        $readuser->save();

        $writeuser = new Permission();
        $writeuser->name = 'Edit users';
        $writeuser->slug = 'users-edit';
        $writeuser->save();

        $createuser = new Permission();
        $createuser->name = 'Create users';
        $createuser->slug = 'users-create';
        $createuser->save();

        $deleteuser = new Permission();
        $deleteuser->name = 'Delete users';
        $deleteuser->slug = 'users-delete';
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
