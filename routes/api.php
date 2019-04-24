<?php

use Illuminate\Http\Request;

Route::group([
    'prefix' => 'v1' // <-- specify API version here
], function () {
    /*--------------------------------------------------------------------------
      Auth
    --------------------------------------------------------------------------*/
    Route::group([
        'namespace' => 'Library\Auth',
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function () {
        // signup
        Route::post('users', 'AuthController@signup');
        Route::post('activations/{token}', 'AuthController@signupActivate');

        // login
        Route::post('sessions', 'AuthController@login');

        // get/logout
        Route::group([
            'middleware' => 'auth:api'
        ], function() {
            Route::get('sessions/current', 'AuthController@user');
            Route::delete('sessions/current', 'AuthController@logout');
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