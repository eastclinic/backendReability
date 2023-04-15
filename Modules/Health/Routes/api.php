<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Health\Http\Controllers\Admin\ServiceResourceController;
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
Route::group([
    'prefix'=>'health', 'middleware' => 'api',
], function ($router) {

    Route::apiResources([
        'services'=>ServiceResourceController::class
    ]);


});
