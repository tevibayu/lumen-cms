<?php

$api = app('Dingo\Api\Routing\Router');
$api->version(env('API_VERSION', 'v1'), ['namespace' => 'Modules\Home\Http\Controllers', 'middleware' => ['cors']], function ($api) 
{
    $api->group(['prefix' => 'home'], function($api) {
        $api->get('/', ['uses' => 'HomeController@index']);
    });
});

$api->version(env('API_VERSION', 'v1'), ['namespace' => 'Modules\Home\Http\Controllers', 'middleware' => ['cors', 'auth', 'permission:test123']], function ($api) 
{
	$api->group(['prefix' => 'home'], function($api) {
        $api->get('/test', ['uses' => 'HomeController@test']);
    });
});