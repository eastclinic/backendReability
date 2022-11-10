<?php

namespace Modules\Reviews\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestHandlers\QueryBuilderHandleApiDataTableService;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Reviews\Entities\Review;
use Illuminate\Database\Eloquent\Relations\Relation;
//use Modules\Reviews\Http\Requests\Admin\IndexRequest;
use App\Http\Requests\ApiDataTableRequest;
use Modules\Reviews\Http\Requests\Admin\Reviews\StoreRequest;
use Modules\Reviews\Http\Requests\Admin\Reviews\UpdateRequest;
use Modules\Reviews\Http\Resources\ReviewResource;
use Modules\Reviews\Http\Services\Target;

class ReviewResourceController extends Controller
{

    private QueryBuilderHandleApiDataTableService $QueryBuilderByRequest;
    private Target $targetModel;

    public function __construct(QueryBuilderHandleApiDataTableService $apiHandler, Target $targetEntity)    {
        $this->QueryBuilderByRequest = $apiHandler;
        $this->targetModel = $targetEntity;
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

        $reviews = $this->QueryBuilderByRequest->build( $reviews, $request );
        $reviews->with('content');

        //necessarily models to collection must get with pagination data:  collection($model->paginate())
        //ReviewResource
        return response()->apiCollection( ReviewResource::collection($reviews->paginate()) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $requestData = $request->validated();
        $review = new Review($requestData);
        $target = $this->targetModel->getModel($requestData['reviewable_type']);
        if( $target && $target->where('id',  $requestData['reviewable_id']) -> first()){
            $review->reviewable()->associate($target);
        }else{
            return response()->error('Не задано, на кого отзыв.', 400);
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
        //
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
        $review = Review::find($id);
        if($review && $review->delete()){
            return response()->okMessage('Removed review');
        }else{
            return  response()->error('not found review', 404);
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
