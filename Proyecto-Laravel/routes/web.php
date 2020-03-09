<?php

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
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::get('/faqs','HomeController@faqs');
Route::get('/contactUs','HomeController@contactUs');
Route::post('/contactUs','HomeController@storeContact');

Route::get('/formRegister','UsersController@create');
Route::post('/register','UsersController@store')->name('register');

Route::post('/login','UsersController@login');
Route::get('/adminListUsers','UsersController@index');
Route::get('/userDetails/{id}','UsersController@show');
Route::get('/formEditAdmin/{id}','UsersController@editAdmin');
Route::get('/formEdit','UsersController@editUserData');
Route::get('/formEditPassword','UsersController@editUserPassword');
Route::get('/formEditAvatar','UsersController@editUserAvatar');
Route::post('/updateData','UsersController@updateData');
Route::post('/updatePassword','UsersController@updatePassword');
Route::get('/createPost','PostsController@create');
Route::post('/post','PostsController@store');
Route::get('/myPosts','PostsController@showMyPosts');
Route::get('/logout','UsersController@logout');
Route::get('/formEditPost/{id}','PostsController@edit');
Route::post('/updatePost','PostsController@update');
Route::get('/listPosts','PostsController@index');
Route::get('/listUsers','UsersController@index');