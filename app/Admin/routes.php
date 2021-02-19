<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.as'),
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', 'UserController')->names('users');
    $router->resource('posts', 'PostController')->names('posts');
    $router->resource('categories', 'CategoryController')->names('categories');
});
