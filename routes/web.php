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
    return view('homepage.pages.home');
});

//login facebook
Route::get('facebook/redirect', 'Auth\SocialController@redirectToProvider');
Route::get('facebook/callback', 'Auth\SocialController@handleProviderCallback');



Auth::routes();

Route::get('/home', 'HomeController@index');

//admin login

	Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('admin/register', 'Auth\RegisterController@register');
	Route::get('admin/login', 'Auth\LoginController@showLoginForm');
	Route::post('admin/login', 'Auth\LoginController@login');	
