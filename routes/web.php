<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('room', 'RoomsController');
Route::get('get-all-rooms', 'RoomsController@getAllRooms');

Route::resource('reservation', 'ReservationController');
Route::get('reservation-details', 'ReservationController@getAllReserv');