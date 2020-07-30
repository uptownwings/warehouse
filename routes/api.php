<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', 'AuthController@register')->name('auth.register');
        Route::post('login', 'AuthController@login')->name('auth.login');
        Route::get('refresh', 'AuthController@refresh')->name('auth.refresh');
        Route::post('reset', 'AuthController@doReset')->name('password.reset');
        Route::post('changepassword', 'AuthController@changepassword')->name('auth.changepassword');
        Route::middleware('auth:api')->group(function () {
            Route::get('user', 'AuthController@user')->name('user');
            Route::post('logout', 'AuthController@logout')->name('logout');
        });
    });

    Route::middleware('auth:api')->group(function () {
        Route::resource('user', 'UserController')->only(['index','show']);
    });
    Route::prefix('warehouse')->middleware('auth:api')->group(function () {
        Route::get('index', 'WarehouseItemController@index')->name('warehouse.index');
        Route::get('item', 'WarehouseItemController@item')->name('warehouse.item');
        Route::post('update', 'WarehouseItemController@update')->name('warehouse.update');
    });
});
