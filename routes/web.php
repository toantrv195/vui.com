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

Route::get('/', 'HomeController@homepage');

//login facebook
Route::get('facebook/redirect', 'Auth\SocialController@redirectToProvider');
Route::get('facebook/callback', 'Auth\SocialController@handleProviderCallback');



Auth::routes();
 
 //pages 
Route::get('/home', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::get('homepage', ['as' =>'page.gethome', 'uses' => 'HomeController@homepage']);
Route::get('category/{alias}', ['as' => 'category', 'uses' => 'HomeController@getcategory']);
Route::get('detail/{alias}', ['as' => 'detail', 'uses' => 'HomeController@getdetail']);

// user upload
Route::get('user/{name}', ['as' => 'user.upload', 'uses' => 'HomeController@userupload']);

//video
Route::get('{alias}', ['as' => 'video', 'uses' => 'HomeController@videocate']);
Route::get('video/{alias}', ['as' => 'video.detail', 'uses' => 'HomeController@videodetail']);

//upload
Route::group(['prefix' => 'upload'], function() {
    Route::get('create', 'UploadController@index');
    Route::group(['prefix' => 'image'], function() {
        Route::get('create', ['as' => 'upload.image.getcreate', 'uses' => 'UploadController@getImage']);
        Route::post('create', ['as' => 'upload.image.postcreate', 'uses' => 'UploadController@postImage']);
        Route::get('delete/{alias}', ['as' => 'upload.image.delete', 'uses' => 'UploadController@delete']);
    });

    Route::group(['prefix' => 'video'], function() {
        Route::get('create', ['as' => 'upload.video.getcreate', 'uses' => 'UploadController@getVideo']);
        Route::post('create', ['as' => 'upload.video.postcreate', 'uses' => 'UploadController@postVideo']);
        Route::get('delete/{alias}', ['as' => 'upload.video.delete', 'uses' => 'UploadController@deletevideo']);
    });
});

//search
Route::post('search', ['as' => 'post.search', 'uses' => 'HomeController@search']);

//admin login
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('admin/register', 'Auth\RegisterController@register');
Route::get('admin/login', 'Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Auth\LoginController@login');   

Route::group(['prefix' => 'admin' , 'middleware' => 'admin'], function() {

    //cate
    Route::group(['prefix' => 'category'], function() {
        Route::get('index', ['as' => 'admin.cate.index', 'uses' => 'CateController@index']);
        Route::get('create', ['as' => 'admin.cate.create', 'uses' => 'CateController@create']);
        Route::post('store', ['as' => 'admin.cate.store', 'uses' => 'CateController@store']);
        Route::get('edit/{id}', ['as' => 'admin.cate.edit', 'uses' => 'CateController@edit']);
        Route::post('update/{id}', ['as' => 'admin.cate.update', 'uses' => 'CateController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.cate.destroy', 'uses' => 'CateController@destroy']);


    });

    //product
    Route::group(['prefix' => 'product'], function() {
        Route::get('index', ['as' => 'admin.product.index', 'uses' => 'ProductController@index']);
        Route::get('create', ['as' => 'admin.product.create', 'uses' => 'ProductController@create']);
        Route::post('store', ['as' => 'admin.product.store', 'uses' => 'ProductController@store']);
        Route::get('edit/{id}', ['as' => 'admin.product.edit', 'uses' => 'ProductController@edit']);
        Route::post('update/{id}', ['as' => 'admin.product.update', 'uses' => 'ProductController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.product.destroy', 'uses' => 'ProductController@destroy']);
        Route::get('delimg/{id}', ['as' => 'admin.product.delimg', 'uses' => 'ProductController@delimg']);
        //del all
        Route::post('delselect', ['as' => 'admin.product.delselectall', 'uses' => 'ProductController@delselectall']);
    });

    //video
    Route::group(['prefix' => 'video'], function() {
        Route::get('index', ['as' => 'admin.video.index', 'uses' => 'VideoController@index']);
        Route::get('create', ['as' => 'admin.video.create', 'uses' => 'VideoController@create']);
        Route::post('store', ['as' => 'admin.video.store', 'uses' => 'VideoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.video.edit', 'uses' => 'VideoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.video.update', 'uses' => 'VideoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.video.destroy', 'uses' => 'VideoController@destroy']);

    });
    
    //user
    // Route::resource('user', 'UserController');
    Route::group(['prefix' => 'user'], function() {
        Route::get('index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
        Route::get('create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);
        Route::post('store', ['as' => 'admin.user.store', 'uses' => 'UserController@store']);
        Route::get('edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
        Route::post('update/{id}', ['as' => 'admin.user.update', 'uses' => 'UserController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.user.destroy', 'uses' => 'UserController@destroy']);
    });
});
