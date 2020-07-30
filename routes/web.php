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

Route::get('/', 'homeController@view');
Route::get('/login', 'homeController@login');
Route::get('/register', 'homeController@register');
Route::post('/getWilayah','homeController@getWilayah');
Route::post('/getSekolah','homeController@getSekolah');
