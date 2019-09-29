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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth', 'AuthController@authForm')->name('auth.authForm');
Route::get('logout', 'AuthController@exitPage')->name('auth.exitPage');

Route::post('loginByPhone', 'AuthController@loginByPhone')->name('auth.loginByPhone');
//Route::post('logout', 'AuthController@logout')->name('auth.logout');


