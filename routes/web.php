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
    // return $router->app->version();
    return '';
});

// $router->get('/new-app-key', function() {
//     return response()->json(['new_app_key' => \Illuminate\Support\Str::random(32)]);
// });

// $router->group(['prefix' => 'auth'], function ($router) {
//     $router->post('register', ['as' => 'auth.register', 'uses' => 'AuthController@register']);
//     $router->post('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
//     $router->post('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
//     $router->post('refresh', ['as' => 'auth.refresh', 'uses' => 'AuthController@refresh']);
//     $router->get('me', ['as' => 'auth.me', 'uses' => 'AuthController@me']);
// });