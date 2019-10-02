<?php

$api = app('Dingo\Api\Routing\Router');
$api->version(env('API_VERSION', 'v1'), ['namespace' => 'Modules\Permission\Http\Controllers', 'middleware' => ['cors']], function ($api) 
{
    $api->group(['prefix' => 'permission'], function($api) {
        $api->get('/', ['uses' => 'PermissionController@index']);
        $api->post('/', ['uses' => 'PermissionController@store']);
        $api->get('/all', ['uses' => 'PermissionController@all']);
        $api->get('/{id}', ['uses' => 'PermissionController@show']);
        $api->put('/{id}', ['uses' => 'PermissionController@update']);
        $api->delete('/{id}', ['uses' => 'PermissionController@destroy']);
    });
});
