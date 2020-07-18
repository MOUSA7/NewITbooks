<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
contains the "web" middleware group. Now create something great!
*/
View::share('user',App\User::all());
View::share('blogs',App\Blog::all());
View::share('c',App\Category::latest()->get());


Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

//Route::get('/login/facebook','Auth\LoginController@redirectToProvider');
//Route::get('/login/facebook/callback','Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/blog/trash','BlogController@trash')->name('blog.trash');
Route::get('/blog/trash/{id}/restore','BlogController@restore');

Auth::routes();

Route::get('/userslist','UsersController@UserList')->name('users.userslist');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blog','BlogController@index')->name('blog.index');
Route::get('/blog/create','BlogController@create')->name('blog.create');
Route::post('/blog/create','BlogController@store');
Route::get('/blog/{slug}','BlogController@show')->name('blog.show');
Route::patch('/blog/{id}','BlogController@publish');
Route::get('/blog/{id}/edit','BlogController@edit')->name('blog.edit');
Route::patch('/blog/{id}/edit','BlogController@update');
Route::get('/blog/{id}/delete','BlogController@delete');

Route::get('/admin','AdminController@index')->name('admin.index');

Route::resource('/categories','CategoryController');
Route::resource('/media','PhotoController');
Route::resource('/users','UsersController');

Route::get('/contact','MailController@contact');
Route::post('/contact','MailController@send');
