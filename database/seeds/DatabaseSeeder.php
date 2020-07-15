<?php

use App\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

        $roles = [
            'Administrator','Author','Subscriber'
        ];
        foreach ($roles as $role){
            Role::create(['name'=>$role]);
        }
    }
}
