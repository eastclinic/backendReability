<?php

namespace Modules\Reviews\Http\Controllers;

use App\Http\Requests\ApiAbstractRequest;
use App\Services\ApiRequestQueryBuilders\ApiRequestQueryBuilderAbstractService;
use App\Services\ApiRequestQueryBuilders\ApiListService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Http\Resources\ReviewResource;

class DoctorReviewController extends Controller
{

    private ApiRequestQueryBuilderAbstractService $queryBuilderByRequest;
    private const TARGET_PSEUDONYM = 'doctor';

    public function __construct(ApiRequestQueryBuilderAbstractService $apiHandler)    {
        $this->queryBuilderByRequest = $apiHandler;
    }

    public function getReviews(ApiAbstractRequest $request)
    {

        //checked doctorId in request class
        $reviews = Review::query();
        $reviews->where('published', 1);

        $reviews = $this->queryBuilderByRequest->build( $reviews, $request );

        $reviews->with('content')->with('messages');

        $requestData = $request->validated();

        //need reviews only doctor and specified doctorId
        $reviews->where('reviewable_id', $requestData['doctorId']);
        $reviews->where('reviewable_type', self::TARGET_PSEUDONYM);
//        dd(ReviewResource::collection($reviews->paginate()));
        return response()->apiCollection( ReviewResource::collection($reviews->paginate()) );

        //
    }

}
