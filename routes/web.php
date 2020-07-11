<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

View::share('blogs',App\Blog::all());
View::share('c',App\Category::latest()->get());


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/blog/trash','BlogController@trash')->name('blog.trash');
Route::get('/blog/trash/{id}/restore','BlogController@restore');

Auth::routes();

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

Route::get('/userslist','UsersController@UserList');
Route::resource('/categories','CategoryController');
Route::resource('/media','PhotoController');
Route::resource('/users','UsersController');
