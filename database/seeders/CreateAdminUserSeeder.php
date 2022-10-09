<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Permission;

use App\Models\User;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootRole = Role::where('slug','root')->first();
        $admin = Role::where('slug','admin')->first();
        $user = Role::where('slug', 'user')->first();
        $readClients = Permission::where('slug','read-clients')->first();

        $root = new User();
        $root->firstname = 'Damian';
        $root->lastname = 'Ułan';
        $root->email = 'kontakt@damianulan.me';
        $root->password = Hash::make('12345678');
        $root->nickname = 'Damian';
        $root->gender = '1';
        $root->avatar = 'images/portrait/small/avatar-male.png';
        $root->locale = 'en';
        $root->save();
        $root->roles()->attach($rootRole);
        $root->roles()->attach($admin);
        $permissions = Permission::all();
        foreach ($permissions as $permission){
            $root->permissions()->attach($permission);
        }

        $admin1 = new User();
        $admin1->firstname = 'Sys';
        $admin1->lastname = 'Admin';
        $admin1->email = 'admin@damianulan.me';
        $admin1->password = Hash::make('123456');
        $admin1->nickname = 'SysAdmin';
        $admin1->gender = '1';
        $admin1->avatar = 'images/portrait/small/avatar-male.png';
        $admin1->locale = 'en';
        $admin1->save();
        $admin1->roles()->attach($admin);
        $permissions = Permission::all();
        foreach ($permissions as $permission){
            $admin1->permissions()->attach($permission);
        }

        $user1 = new User();
        $user1->firstname = 'Test';
        $user1->lastname = 'User';
        $user1->email = 'demo@damianulan.me';
        $user1->password = Hash::make('123456');
        $user1->nickname = 'Test';
        $user1->gender = '0';
        $user1->avatar = 'images/portrait/small/avatar-male.png';
        $user1->locale = 'en';
        $user1->save();
        $user1->roles()->attach($user);
        $user1->permissions()->attach($readClients);   
    }

}
