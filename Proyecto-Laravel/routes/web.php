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
Route::post('/destroy/{id}','UsersController@destroy');
Route::get('/userDetails/{id}','UsersController@show');
Route::get('/formEdit/{id}','UsersController@editAdmin');
Route::post('/update','UsersController@update');
Route::get('/formEditData','UsersController@editUserData');
Route::get('/formEditPassword','UsersController@editUserPassword');
Route::get('/formEditAvatar','UsersController@editUserAvatar');
Route::post('/updateData','UsersController@updateData');
Route::post('/updatePassword','UsersController@updatePassword');
Route::post('/updateAvatar','UsersController@updateAvatar');
Route::get('/createPost','PostsController@create');
Route::post('/post','PostsController@store');
Route::get('/myPosts','PostsController@showMyPosts');
Route::get('/logout','UsersController@logout');
Route::get('/formEditPost/{id}','PostsController@edit');
Route::post('/updatePost','PostsController@update');
Route::get('/listPosts','PostsController@index');
Route::post('/destroyPost/{id}','PostsController@destroy');
Route::get('/postDetails/{id}','PostsController@show');
Route::get('/listUsers','UsersController@index');

Route::post('/createComment','CommentsController@store');
Route::post('/search','HomeController@search');