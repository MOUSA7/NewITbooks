<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $one_category = new Category();
        $one_category->name = 'PHP';
        $one_category->slug = 'php';
        $one_category->save();

        $two_category = new Category();
        $two_category->name = 'BOOTSTRAP';
        $two_category->slug = 'bootstrap';
        $two_category->save();
        //
    }
}
