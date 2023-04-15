<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use Modules\Reviews\Http\Controllers\Admin\ReviewResourceController;
use Modules\Reviews\Http\Controllers\Admin\TargetTypeController;
use Modules\Reviews\Http\Controllers\DoctorReviewController;
use Modules\Reviews\Http\Controllers\Admin\MessageResourceController;
use Modules\Reviews\Http\Requests\ApiListReviewsByDoctorRequest;

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
    'middleware' => 'api',
], function ($router) {
    Route::get('reviews/reviewable-type', [TargetTypeController::class, 'index']);
//    Route::get('doctor/reviews', [DoctorReviewController::class, 'getReviews']);
    Route::get('doctor/reviews', function (ApiListReviewsByDoctorRequest $request){
        $apiRequestQueryBuilder = resolve('App\Services\ApiRequestQueryBuilders\ApiListService');
        $doctorReviewController = new  DoctorReviewController($apiRequestQueryBuilder);
        return $doctorReviewController->getReviews($request);
    });

    Route::apiResources([
        'reviews'=>ReviewResourceController::class
    ]);
    Route::apiResources([
        'reviews.messages'=>MessageResourceController::class
    ]);

});
