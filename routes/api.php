<?php

use Illuminate\Support\Facades\Route;

Route::get('/connect', 'Api\QuickbooksConnectController@connect');
Route::post('/get/token', 'Api\QuickbooksConnectController@getAuthorization');
Route::get('/get/entities', 'Api\QuickbooksEntityController@getEntities');
Route::post('/proxy', 'Api\QuickbooksApiProxyController@proxyRequest');
