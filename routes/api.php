<?php

use Illuminate\Http\Request;

Route::group([
    'prefix' => 'v1' // <-- specify API version here
], function () {
    /*--------------------------------------------------------------------------
      Auth
    --------------------------------------------------------------------------*/
    Route::group([
        'namespace' => 'Auth',
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function () {
        Route::post('sessions', 'AuthController@login');
        Route::post('users', 'AuthController@signup');
        Route::get('activations/{token}', 'AuthController@signupActivate');

        Route::group([
            'middleware' => 'auth:api'
        ], function() {
            Route::delete('sessions/current', 'AuthController@logout');
            Route::get('sessions/current', 'AuthController@user');
        });
    });

    // Route::group([
    //     'namespace' => 'Auth',
    //     'middleware' => 'api',
    //     'prefix' => 'password'
    // ], function () {
    //     Route::post('create', 'PasswordResetController@create');
    //     Route::get('find/{token}', 'PasswordResetController@find');
    //     Route::post('reset', 'PasswordResetController@reset');
    // });
});