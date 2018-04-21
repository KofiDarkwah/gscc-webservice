<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware'=>'auth'], function () use ($router) {
    //user
    $router->group(['prefix'=> 'users'], function () use  ($router) {
        $router->post('register', 'AuthController@register');
        $router->post('login', 'AuthController@login');
        $router->get('logout', 'AuthController@logout');
        $router->get( '/', 'AuthController@get');
    });

//leader
    $router->group(['prefix'=>'leaders'], function () use ($router) {
        $router->get('/', 'LeaderController@get');
        $router->get('{id}', 'LeaderController@show');
        $router->put('{id}', 'LeaderController@edit');
        $router->delete('{id}', 'LeaderController@delete');
        $router->post('add', 'LeaderController@add');
    });

//ministry
    $router->group(['prefix'=>'ministries'], function () use ($router) {
        $router->get('/', 'MinistryController@get');
        $router->get('{id}', 'MinistryController@show');
        $router->put('{id}', 'MinistryController@edit');
        $router->delete('{id}', 'MinistryController@delete');
        $router->post('add', 'MinistryController@add');
    });

});
