<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function() {
    Route::post('add-property', 'Api\ApiController@addProperty');
    Route::post('add-images', 'Api\ApiController@addImages');
    Route::post('add-inquiry', 'Api\ApiController@addInquiry');

    Route::get('get-detail/{id}', 'Api\ApiController@getDetail');
    Route::get('get-property-image/{id}', 'Api\ApiController@getPropertyImage');
    Route::get('get-title/{id}', 'Api\ApiController@getTitle');
    Route::get('get-properties', 'Api\ApiController@getProperties');
    Route::get('get-property-images', 'Api\ApiController@getPropertyImages');
    Route::get('get-inquiries', 'Api\ApiController@getInquiries');
    Route::get('get-total-inquiry/{corp_id}', 'Api\ApiController@getTotalInquiry');

    Route::post('search-properties', 'Api\ApiController@searchProperties');

    Route::post('/register','Auth\RegisterController@register');
    Route::post('/login', function (Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 401);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    });
});
