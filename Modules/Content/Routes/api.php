<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Content\Http\Controllers\ContentController;
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

//Route::middleware('auth:api')->get('/content', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'middleware' => 'api',
], function ($router) {
error_log('api');

    Route::apiResources([
        'content'=>ContentController::class
    ]);

});
