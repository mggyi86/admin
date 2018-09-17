<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your Admin!
|
*/

Route::get('/', function () {
    return view('backend.dashboard');
});

Route::get('dashboard', function() {
    return view('backend.dashboard');
})->name('dashboard');

Route::get('/division/data', 'DivisionController@division_data')->name('division.data');
Route::resource('/division', 'DivisionController');

