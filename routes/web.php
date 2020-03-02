<?php

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
    return view('welcome');
});

Route::get('/files', 'Core@getDirList');
Route::get('/files/device-status', 'Core@getDeviceStat');
Route::get('/files/device-status', 'Core@getDeviceStat');
Route::get('/files/download/{path}', 'Core@download');
Route::get('/files/{path}', 'Core@file_or_dir');

//Route::resource('/files', 'ApiController');