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
Route::get('/corp/login', function () {
    return view('login-corp');
});

Route::get('/corp/', function () {
    return view('app-corp');
});

Route::get('/corp/{any}', function () {
    return view('app-corp');
})->where('any', '.*');

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

