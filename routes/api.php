<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::prefix('auth')->middleware('api')->group(function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    //'jwt.auth'
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

});

//
//// Handle JWT Authentication
//Route::group(['prefix' => 'auth'], function () {
//    Route::post('login', 'Api\AuthController@login');
//
//    Route::group(['middleware' => 'auth:api-jwt'], function () {
//        Route::post('logout', 'Api\AuthController@logout');
//        Route::post('refresh', 'Api\AuthController@refresh');
//        Route::post('me', 'Api\AuthController@me');
//    });
//});
