<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('posts.index');
});

Auth::routes();

/* Route::post('/publish/{post}', function () {
    return ['success'];
}); */
Route::post('/publish/{post}', 'PublishController@store');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/', 'PostsController@index');
Route::get('/posts/{post}/edit', 'PostsController@edit')->name('profile.edit');
Route::get('/posts/{post}', 'PostsController@show');
Route::patch('/posts/{post}', 'PostsController@update')->name('profile.update');
Route::post('/posts/delete/{post}', 'PostsController@delete');

Route::get('/myposts', 'MyPostsController@index')->name('profile.show');
