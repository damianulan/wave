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

        $businessManage = new Permission();
        $businessManage->slug = 'business/manage';
        $businessManage->save();

        $config = new Permission();
        $config->slug = 'app/config';
        $config->save();


        // Roles

        $root = new Role();
        $root->slug = 'root';
        $root->save();
        $root->permissions()->attach($clientsView);

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
    }
}
