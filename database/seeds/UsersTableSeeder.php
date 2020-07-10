<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $one_user = new User();
        $one_user->name = 'ali';
        $one_user->email = 'ali@gmail.com';
        $one_user->role_id = 1;
        $one_user->password = bcrypt('password');
        $one_user->save();


        //
    }
}
