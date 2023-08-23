<?php

namespace Modules\Reviews\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestQueryBuilders\ApiDataTableService;
use App\Services\Response\ResponseService;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Modules\Reviews\Entities\Review;
use Illuminate\Database\Eloquent\Relations\Relation;
//use Modules\Reviews\Http\Requests\Admin\IndexRequest;
use App\Http\Requests\ApiDataTableRequest;
use Modules\Reviews\Http\Requests\Admin\Reviews\StoreRequest;
use Modules\Reviews\Http\Requests\Admin\Reviews\UpdateRequest;
use Modules\Reviews\Http\Resources\ReviewResource;
use Modules\Reviews\Http\Services\ReviewService;
use Modules\Reviews\Http\Services\Target;
use Illuminate\Support\Facades\Response;

class ReviewResourceController extends Controller
{

    private ApiDataTableService $QueryBuilderByRequest;
    private Target $targetModel;
    private ReviewService $reviewService;

    public function __construct(
        ReviewService $reviewService,
        ApiDataTableService $apiHandler,
        Target $targetEntity)    {
        $this->QueryBuilderByRequest = $apiHandler;
        $this->targetModel = $targetEntity;
        $this->reviewService = $reviewService;

    }

    /**
     * Display a listing of the resource.
     * @param ApiDataTableRequest $request
     * @return array|string
     */
    public function index(ApiDataTableRequest $request)
    {


//      $reviews = Review::where('id', '>', 10); // another init query
        $reviews = Review::query();

        //Log::info('ReviewResourceController index!');
        $reviews = $this->QueryBuilderByRequest->build( $reviews, $request );
//        $reviews->with('content')->with('messages');
        $reviews->with(['content' => function ($query) {
            $query->where('type', 'original');
        }])->with('messages');

        //necessarily models to collection must get with pagination data:  collection($model->paginate())
        //ReviewResource
//        return response()->apiCollection( $reviews );
        return ResponseService::apiCollection( ReviewResource::collection($reviews->paginate()) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        error_log('store-rewiew');
        $requestData = $request->validated();

        $review = new Review($requestData);
        $target = $this->targetModel->getModel($requestData['reviewable_type']);
        if( !$target || !$target->where('id',  $requestData['reviewable_id']) -> first()){
            return response()->error('Не задано, на кого отзыв.', 400);
        }else{
           // Log::info(print_r(phpinfo(),1));
            //todo check why not work associate
            //$review->reviewable()->associate($target);
        }
        $review->save();

        return response()->okMessage('Save new review.', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviews = Review::query()->where('id', $id);
        $reviews->with('content')->with('messages');
        return ResponseService::apiCollection( ReviewResource::collection($reviews->paginate()) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        Log::info(print_r($request->validated(), 1));
        $review = Review::where('id', $id)->first();
        $review -> update($request->validated());
        return response()->okMessage('Change data.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if($this->reviewService->delete($id)){
            return ResponseService::okMessage('Removed review');
        }else{
            return  ResponseService::error('Failed to remove review');
        }
    }


    public function reviewableType() {
        $accessList = ['doctorReview' => ['id' => 'doctorReview', 'text' => 'Доктор']];
        //return array_values(array_intersect_key( $accessList, Relation::$morphMap ));

        return response()->json([ 'data' => array_values(array_intersect_key( $accessList, Relation::$morphMap )), 'code' => 200, 'ok' => true],200);

    }



    private function getReviewableType($requestType){

    }


}
