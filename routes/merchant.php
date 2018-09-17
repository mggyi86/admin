<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Merchant Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Merchant routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "merchant" middleware group. Enjoy building your Merchant!
|
*/

Route::get('/', function () {
    dd("Merchant");
});
