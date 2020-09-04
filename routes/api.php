<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', 'Api\ApiController@getUser');
    Route::group(['middleware' => ['api']], function () {
        Route::get('/get-bookmarked-properties', 'Api\ApiController@getBookmarkedProperties');
        Route::post('/add-bookmark', 'Api\ApiController@addBookmark');
    });
});

Route::middleware('auth:sanctum_corp')->group(function () {
    Route::get('/corp', 'Api\ApiController@getCorp');
    Route::group(['middleware' => ['api']], function () {
        Route::get('get-total-inquiry', 'Api\ApiController@getTotalInquiry');
        Route::get('get-properties-by-corp', 'Api\ApiController@getPropertiesByCorp');
        Route::get('get-inquiries-by-corp', 'Api\ApiController@getInquiriesByCorp');
        Route::post('modify-corp-email', 'Api\ApiController@modifyCorpEmail');
        Route::post('modify-corp-password', 'Api\ApiController@modifyCorpPassword');
        Route::post('add-property', 'Api\ApiController@addProperty');
        Route::post('add-properties', 'Api\ApiController@addProperties');
        Route::post('delete-property', 'Api\ApiController@deleteProperty');
        Route::post('update-property', 'Api\ApiController@updateProperty');
        Route::post('close-property', 'Api\ApiController@closeProperty');
        Route::post('add-images', 'Api\ApiController@addImages');
    });
});

Route::group(['middleware' => ['api']], function () {

    Route::post('add-inquiry', 'Api\ApiController@addInquiry');

    Route::get('get-detail/{id}', 'Api\ApiController@getDetail');
    Route::get('get-property-image/{id}', 'Api\ApiController@getPropertyImage');
    Route::get('get-title/{id}', 'Api\ApiController@getTitle');
    Route::get('get-properties', 'Api\ApiController@getProperties');
    Route::get('get-property-images', 'Api\ApiController@getPropertyImages');
    Route::get('get-inquiries', 'Api\ApiController@getInquiries');

    Route::post('search-properties', 'Api\ApiController@searchProperties');
    Route::post('get-latest-properties', 'Api\ApiController@getLatestProperties');

    Route::post('/register', 'Auth\RegisterController@register');
    Route::post('/register-corp', 'Auth\RegisterCorpController@register');

});

