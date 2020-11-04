<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app_form');
});

Route::group(['prefix' => 'app_form', 'as' => 'app_form.'], function () {
    Route::get('/', 'FormAppController@index')->name('index');
    Route::post('/store', 'FormAppController@store')->name('store');
});
