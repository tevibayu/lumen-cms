<?php

$api = app('Dingo\Api\Routing\Router');
$api->version(env('API_VERSION', 'v1'), ['namespace' => 'Modules\Users\Http\Controllers', 'middleware' => ['cors']], function ($api) 
{
    $api->group(['prefix' => 'users'], function($api) {
        $api->get('/', ['uses' => 'UsersController@index']);
        $api->post('/', ['uses' => 'UsersController@store']);
        $api->get('/all', ['uses' => 'UsersController@all']);
        $api->get('/{id}', ['uses' => 'UsersController@show']);
        $api->put('/{id}', ['uses' => 'UsersController@update']);
        $api->delete('/{id}', ['uses' => 'UsersController@destroy']);
    });
});
