<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'admin'],
    function () {
        Route::group(
            ['namespace' => 'Auth'],
            function () {
                Route::get('/login', 'LoginController@showAdminLoginForm');
                Route::post('/login', 'LoginController@adminLogin');
                Route::get('/register', 'RegisterController@showAdminRegisterForm');
                Route::post('/register', 'RegisterController@createAdmin');
            }
        );
        Route::middleware(['auth:admin'])->group(function () {
            Route::get('/users', 'UserController@index')->name('users.index');
            Route::post('/users/{id}', 'UserController@verify')->name('users.verify');
            Route::delete('/users/{id}', 'UserController@destroy')->name('users.destroy');
        });
    }
);
