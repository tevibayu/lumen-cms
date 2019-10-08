<?php

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['namespace' => 'Modules\Ai\Http\Controllers', 'middleware' => ['cors']], function ($api) 
{
    $api->group(['prefix' => 'ai'], function($api) {
        $api->get('/', ['uses' => 'AiController@index']);
        $api->post('/', ['uses' => 'AiController@store']);
        $api->get('/all', ['uses' => 'AiController@all']);
        $api->get('/{id}', ['uses' => 'AiController@show']);
        $api->put('/{id}', ['uses' => 'AiController@update']);
        $api->delete('/{id}', ['uses' => 'AiController@destroy']);
    });
});
