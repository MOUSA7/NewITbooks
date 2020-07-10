<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $one_blog = new Blog();
        $one_blog->title = 'First Title';
        $one_blog->slug = 'first-title';
        $one_blog->meta_title = 'First Title';
        $one_blog->meta_desc = 'First Title';
        $one_blog->body = 'This is very nice But some people need action occur so be save';
        $one_blog->save();

        $two_blog = new Blog();
        $two_blog->title = 'Second Title';
        $two_blog->slug = 'second-title';
        $two_blog->meta_title = 'Second Title';
        $two_blog->meta_desc = 'Second Title';
        $two_blog->body = 'This is very nice But some people need action occur so be save';
        $two_blog->save();

        $three_blog = new Blog();
        $three_blog->title = 'Third Title';
        $three_blog->slug = 'third-title';
        $three_blog->meta_title = 'Third Title';
        $three_blog->meta_desc = 'Third Title';
        $three_blog->body = 'This is very nice But some people need action occur so be save';
        $three_blog->save();
        //
    }
}
