<?php

$api = app('Dingo\Api\Routing\Router');
$api->version(env('API_VERSION', 'v1'), ['namespace' => 'Modules\APIDocs\Http\Controllers', 'middleware' => ['cors']], function ($api) 
{
    $api->group(['prefix' => 'documentation'], function($api) {
        $api->get('/', ['uses' => 'APIDocsController@index']);
        $api->get('/json', ['uses' => 'APIDocsController@json']);

        $api->get('/key', function() {
            return str_random(32);
        });
    });
});

// Route::group(['prefix' => 'home', 'namespace' => 'Modules\Home\Http\Controllers'], function()
// {
//     Route::get('/{id}', 'HomeController@index');
// });
