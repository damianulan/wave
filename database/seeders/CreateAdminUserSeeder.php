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
        $rootRole = Role::where('slug','root');
        $admin = Role::where('slug','admin');
        $employee = Role::where('slug', 'employee');

        $root = new User();
        $root->firstname = 'Damian';
        $root->lastname = 'Ułan';
        $root->email = 'kontakt@damianulan.me';
        $root->password = '12345678';
        $root->nickname = 'Damian';
        $root->gender = '1';
        $root->avatar = 'images/portrait/small/avatar-male.png';
        $root->locale = 'en';
        $root->save();
        $root->roles()->attach($rootRole);

        $admin1 = new User();
        $admin1->firstname = 'Sys';
        $admin1->lastname = 'Admin';
        $admin1->email = 'admin@damianulan.me';
        $admin1->password = '123456';
        $admin1->nickname = 'SysAdmin';
        $admin1->gender = '1';
        $admin1->avatar = 'images/portrait/small/avatar-male.png';
        $admin1->locale = 'en';
        $admin1->save();
        $admin1->roles()->attach($admin);

        $user1 = new User();
        $user1->firstname = 'Test';
        $user1->lastname = 'User';
        $user1->email = 'demo@damianulan.me';
        $user1->password = '123456';
        $user1->nickname = 'Test';
        $user1->gender = '0';
        $user1->avatar = 'images/portrait/small/avatar-male.png';
        $user1->locale = 'en';
        $user1->save();
        $user1->roles()->attach($user);
    }

}
