<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', 
    function(){
        return response()->json(
            [
                'version' => app()->version(),
            ]
    );
});

Route::group([

        'prefix' => 'auth'

    ], function ($router) {

        Route::post('login', 'App\Http\Controllers\AuthController@login');        
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('refresh', 'App\Http\Controllers\AuthController@refresh');
        Route::get('me', 'App\Http\Controllers\AuthController@me');

        Route::post('register','App\Http\Controllers\AuthController@register');
    });

Route::group([
    
        'middleware' => 'auth:api'

    ], function($router){

        Route::patch('user/profile', 'App\Http\Controllers\UserController@profile');
    }
);
