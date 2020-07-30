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
Route::get('/corp/login', 'Auth\LoginCorpController@index');

Route::get('/corp/register', 'ViewController@viewMetaCorp');

Route::get('/corp', 'CorpController@index');

Route::get('/corp/{any}', 'CorpController@index')->where('any', '.*');

Route::get('/mypage', 'MypageController@index')->name('mypage');

Route::get('{any}', 'ViewController@viewApp')->where('any', '.*');

Route::post('/corp/login', 'Auth\LoginCorpController@login')->name('login-corp');

Route::post('/corp/logout', 'Auth\LoginCorpController@logout')->name('logout-corp');

Auth::routes();
