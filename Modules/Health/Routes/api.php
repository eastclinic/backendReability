<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Health\Http\Controllers\Admin\ServiceResourceController;
use Modules\Health\Http\Controllers\Admin\HealthVariationsController;
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
//    Route::get('binds',[HealthBindsController::class, 'binds']);

    //todo handle {baseModel}/{secondModel} vars
    Route::apiResources([
        'services'=>ServiceResourceController::class,
        'binds/{baseModel}/{secondModel}'=> HealthVariationsController::class
    ]);








});
