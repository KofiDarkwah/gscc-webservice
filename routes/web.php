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

//user
$router->post('/user/register', 'AuthController@register');
$router->post('/user/login', 'AuthController@login');
$router->get('/user/logout', 'AuthController@logout');

//leader
$router->get('/leaders', 'LeaderController@get');
$router->get('/leader/{id}', 'LeaderController@show');
$router->post('/leader/add', 'LeaderController@add');
