<?php

$api = app('Dingo\Api\Routing\Router');
// default v1 version API
// header  Accept:application/vnd.lumen.v1+json
$api->version('v1', [
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['cors']
], function ($api) {
    // test
    $api->get('test', 'TestController@test');
    $api->group([
        'prefix' => 'auth',
    ], function ($api) {
        // register
        $api->post('register', [
            'as' => 'auth.register',
            'uses' => 'AuthController@register',
        ]);
        // login
        $api->post('login', [
            'as' => 'auth.login',
            'uses' => 'AuthController@login',
        ]);
        // refresh
        $api->post('refresh', [
            'as' => 'auth.refresh',
            'uses' => 'AuthController@refresh',
        ]);
        // me
        $api->get('me', [
            'as' => 'auth.me',
            'uses' => 'AuthController@me',
        ]);
        // getCurrentToken
        $api->post('token', [
            'as' => 'auth.getCurrentToken',
            'uses' => 'AuthController@getCurrentToken',
        ]);
        // logout
        $api->post('logout', [
            'as' => 'auth.logout',
            'uses' => 'AuthController@logout',
        ]);
    });
    
});
