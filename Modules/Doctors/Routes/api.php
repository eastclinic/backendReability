<?php

use App\Http\Requests\ApiAbstractRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Services\ApiRequestQueryBuilders\ApiListService;


use Modules\Doctors\Http\Controllers\Admin\DoctorResourceController ;
use Modules\Doctors\Http\Controllers\Front\DoctorController as FrontDoctorController;
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
//admin
//add check access
Route::group([
    'middleware' => 'api',
], function ($router) {

    Route::apiResources([
        'doctors'=>DoctorResourceController::class
    ]);

});

//front

Route::group([
    'middleware' => 'api',
], function ($router) {

    Route::get('/doctors', function (ApiAbstractRequest $request) {
        return (new FrontDoctorController(new ApiListService())) ->index($request);
    });
});
