<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'orders' , 'as' => 'orders.'], function () {
    Route::post('/store', 'OrderController@store')->name('store');
});

Route::group(['prefix' => 'drivers_orders' , 'as' => 'drivers_orders.'], function () {
    Route::post('/driver_accept_order', 'DriverOrderController@accept_order');
    Route::post('/driver_cancel_order', 'DriverOrderController@cancel_order');
});
