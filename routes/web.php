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

Route::get('/', 'RouteController@home');

Route::get('/freeplay', 'RouteController@freeplay');

Route::get('/50roundtest', 'AuthenticatedRouteController@roundTest');

Route::get('/hordeBattle', 'RouteController@hordeBattle');

Route::get('/leaderboard', 'RouteController@leaderboard');

Route::post('/score/{user}', 'RouteController@storeScore');

Auth::routes();

Route::get('/myscores', 'AuthenticatedRouteController@myscores');