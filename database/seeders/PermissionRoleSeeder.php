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

        $usersblock = new Permission();
        $usersblock->slug = 'users/block';
        $usersblock->save();

        $usersExtradata = new Permission();
        $usersExtradata->slug = 'users/extradata';
        $usersExtradata->save();

        // Services
        $servicesView = new Permission();
        $servicesView->slug = 'services/view';
        $servicesView->save();

        $servicesEdit = new Permission();
        $servicesEdit->slug = 'services/edit';
        $servicesEdit->save();

        $servicesCreate = new Permission();
        $servicesCreate->slug = 'services/create';
        $servicesCreate->save();

        $servicesDelete = new Permission();
        $servicesDelete->slug = 'services/delete';
        $servicesDelete->save();

        // Business
        $businessManage = new Permission();
        $businessManage->slug = 'business/manage';
        $businessManage->save();

        $analyticsManage = new Permission();
        $analyticsManage->slug = 'business/analytics';
        $analyticsManage->save();

        $financesManage = new Permission();
        $financesManage->slug = 'business/finances';
        $financesManage->save();

        // App Configuration
        $config = new Permission();
        $config->slug = 'app/config';
        $config->save();

        $permissions = new Permission();
        $permissions->slug = 'app/permissions';
        $permissions->save();

        $roles = new Permission();
        $roles->slug = 'app/roles';
        $roles->save();

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
        $root->permissions()->attach($usersblock);
        $root->permissions()->attach($usersExtradata);

        $root->permissions()->attach($servicesView);
        $root->permissions()->attach($servicesEdit);
        $root->permissions()->attach($servicesCreate);
        $root->permissions()->attach($servicesDelete);

        $root->permissions()->attach($businessManage);
        $root->permissions()->attach($analyticsManage);
        $root->permissions()->attach($financesManage);

        $root->permissions()->attach($config);
        $root->permissions()->attach($permissions);
        $root->permissions()->attach($roles);


        // admin
        $admin->permissions()->attach($clientsView);
        $admin->permissions()->attach($clientsEdit);
        $admin->permissions()->attach($clientsCreate);
        $admin->permissions()->attach($clientsDelete);

        $admin->permissions()->attach($usersView);
        $admin->permissions()->attach($usersEdit);
        $admin->permissions()->attach($usersCreate);
        $admin->permissions()->attach($usersDelete);
        $admin->permissions()->attach($usersblock);
        $admin->permissions()->attach($usersExtradata);

        $admin->permissions()->attach($servicesView);
        $admin->permissions()->attach($servicesEdit);
        $admin->permissions()->attach($servicesCreate);
        $admin->permissions()->attach($servicesDelete);

        $admin->permissions()->attach($businessManage);
        $admin->permissions()->attach($analyticsManage);
        $admin->permissions()->attach($financesManage);

        $admin->permissions()->attach($config);
        $admin->permissions()->attach($permissions);
        $admin->permissions()->attach($roles);
    }
}
