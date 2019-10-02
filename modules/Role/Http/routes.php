<?php

$api = app('Dingo\Api\Routing\Router');
$api->version(env('API_VERSION', 'v1'), ['namespace' => 'Modules\Role\Http\Controllers', 'middleware' => ['cors']], function ($api) 
{
    $api->group(['prefix' => 'role'], function($api) {
        $api->get('/', ['uses' => 'RoleController@index']);
        $api->post('/', ['uses' => 'RoleController@store']);
        $api->get('/all', ['uses' => 'RoleController@all']);
        $api->get('/{id}', ['uses' => 'RoleController@show']);
        $api->put('/{id}', ['uses' => 'RoleController@update']);
        $api->delete('/{id}', ['uses' => 'RoleController@destroy']);
    });
});
