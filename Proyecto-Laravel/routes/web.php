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

Route::get('/formRegister','UsersController@create');
Route::post('/register','UsersController@store')->name('register');

Route::post('/login','UsersController@login');
Route::get('/adminListUsers','UsersController@index');
Route::get('/userDetails/{id}','UsersController@show');
Route::get('/formEdit','UsersController@editAdmin');
