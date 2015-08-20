<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('home', 'HomeController@index');



// Controller
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);



// User Center
Route::group(['prefix' => 'uc',], function() {
    Route::get('edit-avatar', ['as' => 'uc.edit-avatar', 'uses' => 'UserCenterController@editAvatar']);
    Route::post('update-avatar', ['as' => 'uc.update-avatar', 'uses' => 'UserCenterController@updateAvatar']);
});



// Resource
Route::resource('uc', 'UserCenterController');
Route::resource('topic', 'TopicController');
Route::resource('article', 'ArticleController');
Route::resource('blog', 'BlogController');
Route::resource('comment', 'CommentController');



// Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function() {
    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'Dashboard\HomeController@index']);

    // Category
    Route::group(['prefix' => 'category',], function() {
        Route::get('order', ['as' => 'dashboard.category.order', 'uses' => 'Dashboard\CategoryController@order']);
        Route::post('order-handle', ['as' => 'dashboard.category.order-handle', 'uses' => 'Dashboard\CategoryController@orderHandle']);
    });
    Route::resource('category', 'Dashboard\CategoryController');

    Route::resource('topic', 'Dashboard\TopicController');
    Route::resource('article', 'Dashboard\ArticleController');
    Route::resource('blog', 'Dashboard\BlogController');

    Route::resource('system', 'Dashboard\SystemController');
});
