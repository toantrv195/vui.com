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

Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'category'], function() {
        Route::get('index', ['as' => 'admin.cate.index', 'uses' => 'CateController@index']);
        Route::get('create', ['as' => 'admin.cate.create', 'uses' => 'CateController@create']);
        Route::post('store', ['as' => 'admin.cate.store', 'uses' => 'CateController@store']);
        Route::get('edit/{id}', ['as' => 'admin.cate.edit', 'uses' => 'CateController@edit']);
        Route::post('update/{id}', ['as' => 'admin.cate.update', 'uses' => 'CateController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.cate.destroy', 'uses' => 'CateController@destroy']);


    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('index', ['as' => 'admin.product.index', 'uses' => 'ProductController@index']);
        Route::get('create', ['as' => 'admin.product.create', 'uses' => 'ProductController@create']);
        Route::post('store', ['as' => 'admin.product.store', 'uses' => 'ProductController@store']);
        Route::get('edit/{id}', ['as' => 'admin.product.edit', 'uses' => 'ProductController@edit']);
        Route::post('update/{id}', ['as' => 'admin.product.update', 'uses' => 'ProductController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.cate.destroy', 'uses' => 'ProductController@destroy']);
    });
});
