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

//Route::middleware('jwt.auth')->group(function() {
//    Route::prefix('tasks')->group(function() {
//        Route::get('/', [TaskListController::class, 'index']);
//        Route::post('list/store', [TaskListController::class, 'store']);
//    });
//});

Route::prefix('v1')->middleware('api')->group( function ($router) {

    Route::get('reviews/reviewable-type', [TargetTypeController::class, 'index']);
//    Route::get('doctor/reviews', [DoctorReviewController::class, 'getReviews']);
    Route::get('doctor/reviews', function (ApiListReviewsByDoctorRequest $request){
        $apiRequestQueryBuilder = resolve('App\Services\ApiRequestQueryBuilders\ApiListService');
        $doctorReviewController = new  DoctorReviewController($apiRequestQueryBuilder);
        return $doctorReviewController->getReviews($request);
    });
//    Route::get('reviews/content',[ReviewContentController::class]);
    Route::apiResources([
        'reviews'=>ReviewResourceController::class
    ]);
    Route::apiResources([
        'reviews.messages'=>MessageResourceController::class
    ]);

});
