<?php

namespace Modules\Reviews\Http\Controllers;

use Modules\Reviews\Http\Requests\GetReviewsByDoctorRequest;
use App\Services\ApiRequestHandlers\QueryBuilderHandleApiListService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Http\Resources\ReviewResource;

class DoctorReviewController extends Controller
{

    private QueryBuilderHandleApiListService $queryBuilderByRequest;
    private const TARGET_PSEUDONYM = 'doctorReview';

    public function __construct(QueryBuilderHandleApiListService $apiHandler)    {
        $this->queryBuilderByRequest = $apiHandler;
    }

    public function getReviews(GetReviewsByDoctorRequest $request)
    {
        //checked doctorId in request class
        $reviews = Review::query();
        $reviews = $this->queryBuilderByRequest->build( $reviews, $request );
        $reviews->with('content');
        $requestData = $request->validated();
        //need reviews only doctor and specified doctorId
        $reviews->where('reviewable_id', $requestData['doctorId']);
        $reviews->where('reviewable_type', self::TARGET_PSEUDONYM);

        return response()->apiCollection( ReviewResource::collection($reviews->paginate()) );

        //
    }

}
