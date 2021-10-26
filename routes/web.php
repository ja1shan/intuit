<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AppController@index');
Route::get('/connect', 'AppController@connect');
Route::get('/callback', 'AppController@callback');
Route::get('/test', 'AppController@test');
