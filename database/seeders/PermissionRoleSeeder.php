<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *  Permissions
         */ 

        // Clients
        $clientsView = new Permission();
        $clientsView->slug = 'clients/view';
        $clientsView->save();

        $clientsEdit = new Permission();
        $clientsEdit->slug = 'clients/edit';
        $clientsEdit->save();

        $clientsCreate = new Permission();
        $clientsCreate->slug = 'clients/create';
        $clientsCreate->save();

        $clientsDelete = new Permission();
        $clientsDelete->slug = 'clients/delete';
        $clientsDelete->save();

        // Users
        $usersView = new Permission();
        $usersView->slug = 'users/view';
        $usersView->save();

        $usersEdit = new Permission();
        $usersEdit->slug = 'users/edit';
        $usersEdit->save();

        $usersCreate = new Permission();
        $usersCreate->slug = 'users/create';
        $usersCreate->save();

        $usersDelete = new Permission();
        $usersDelete->slug = 'users/delete';
        $usersDelete->save();

        $usersDelete = new Permission();
        $usersDelete->slug = 'users/block';
        $usersDelete->save();

        // Business
        $businessManage = new Permission();
        $businessManage->slug = 'business/manage';
        $businessManage->save();

        // App Configuration
        $config = new Permission();
        $config->slug = 'app/config';
        $config->save();

        /**
         *  Roles
         */
        $root = new Role();
        $root->slug = 'root';
        $root->save();

        $admin = new Role();
        $admin->slug = 'admin';
        $admin->save();

        $manager = new Role();
        $manager->slug = 'manager';
        $manager->save();

        $staff = new Role();
        $staff->slug = 'employee';
        $staff->save();

        $trainee = new Role();
        $trainee->slug = 'trainee';
        $trainee->save();


        /**
         * Attach default Permissions to a Role
        */
        
        // root
        $root->permissions()->attach($clientsView);
        $root->permissions()->attach($clientsEdit);
        $root->permissions()->attach($clientsCreate);
        $root->permissions()->attach($clientsDelete);

        $root->permissions()->attach($usersView);
        $root->permissions()->attach($usersEdit);
        $root->permissions()->attach($usersCreate);
        $root->permissions()->attach($usersDelete);

        $root->permissions()->attach($businessManage);

        $root->permissions()->attach($config);


        // admin
        $admin->permissions()->attach($clientsView);
        $admin->permissions()->attach($clientsEdit);
        $admin->permissions()->attach($clientsCreate);
        $admin->permissions()->attach($clientsDelete);

        $admin->permissions()->attach($usersView);
        $admin->permissions()->attach($usersEdit);
        $admin->permissions()->attach($usersCreate);
        $admin->permissions()->attach($usersDelete);

        $admin->permissions()->attach($businessManage);

        $admin->permissions()->attach($config);
    }
}
