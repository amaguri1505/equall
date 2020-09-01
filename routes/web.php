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
Route::post('/corp/login', 'Auth\LoginCorpController@login')->name('login-corp');
Route::post('/corp/logout', 'Auth\LoginCorpController@logout')->name('logout-corp');
Route::get('/corp/{any}', 'CorpController@index')->where('any', '.*');

Route::get('/login', 'Auth\LoginController@index');
Route::get('/register', 'ViewController@viewMetaCorp');
//Route::get('/mypage', 'MypageController@index')->name('mypage');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'ViewController@viewApp')->name('index');
Route::get('{any}', 'ViewController@viewApp')->where('any', '.*');

//Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//Route::get('/email/corp/verify/{id}', 'Auth\VerificationCorpController@verify')->name('verification-corp.verify');
