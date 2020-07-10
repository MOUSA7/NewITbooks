<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin = new Role();
        $role_admin->name = 'Administrator';
        $role_admin->save();

        $role_subscribe = new Role();
        $role_subscribe->name = 'Subscriber';
        $role_subscribe->save();

        $role_mentor = new Role();
        $role_mentor->name = 'Mentor';
        $role_mentor->save();
        //
    }
}
