<?php

namespace Modules\Reviews\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestQueryBuilders\ApiDataTableService;
use App\Services\Response\ResponseService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Modules\Reviews\Entities\Review;
use Illuminate\Database\Eloquent\Relations\Relation;
//use Modules\Reviews\Http\Requests\Admin\IndexRequest;
use App\Http\Requests\ApiDataTableRequest;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Http\Requests\Admin\Reviews\ContentRequest;
use Modules\Reviews\Http\Requests\Admin\Reviews\StoreContentRequest;
use Modules\Reviews\Http\Requests\Admin\Reviews\UpdateRequest;
use Modules\Reviews\Transformers\Admin\ReviewContentResource;
use Illuminate\Support\Facades\Storage;

class ReviewContentController extends Controller
{

//    private ApiDataTableService $QueryBuilderByRequest;
//    private Target $targetModel;
//    private ReviewService $reviewService;
//
//    public function __construct(
////        ReviewService $reviewService,
//        ApiDataTableService $apiHandler,
//        Target $targetEntity)    {
//        $this->QueryBuilderByRequest = $apiHandler;
//        $this->targetModel = $targetEntity;
////        $this->reviewService = $reviewService;
//
//    }

    /**
     * Display a listing of the resource.
     * @param ApiDataTableRequest $request
     * @return array|string
     */
    public function index(ApiDataTableRequest $request)
    {


//      $reviews = Review::where('id', '>', 10); // another init query

        $reviews = ReviewContent::query();

        //Log::info('ReviewResourceController index!');
//        $reviews = $this->QueryBuilderByRequest->build( $reviews, $request );
//        $reviews->with('content')->with('messages');

        //necessarily models to collection must get with pagination data:  collection($model->paginate())
        //ReviewResource
//        return response()->apiCollection( $reviews );
        return ResponseService::apiCollection( ReviewContentResource::collection($reviews->paginate()) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentRequest $request)
    {
        error_log('store');
        $requestData = $request->validated();
        $fileNames = [];
        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $file) {

                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                Storage::disk('reviewContent')->putFileAs('upload', $file, $fileName);
                $fileNames[] = $fileName;
            }


        }
        return response()->ok([$fileNames], 200);
        $review = new ReviewContent($requestData);
////        $target = $this->targetModel->getModel($requestData['reviewable_type']);
////        if( !$target || !$target->where('id',  $requestData['reviewable_id']) -> first()){
////            return response()->error('Не задано, на кого отзыв.', 400);
////        }else{
////           // Log::info(print_r(phpinfo(),1));
////            //todo check why not work associate
////            //$review->reviewable()->associate($target);
////        }
        $review->save();
//
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
        $reviews = ReviewContent::query()->where('id', $id);
        return ResponseService::apiCollection( ReviewContentResource::collection($reviews->paginate()) );
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
        $requestData = $request->validated();
        error_log('update');
        error_log('id - ' . $id);
        error_log(print_r($requestData, 1));
        if(!$requestData['id']) {
            $content = new Review($requestData);
            $content->save();
        }
//        $review = ReviewContent::where('id', $id)->first();
//        $review -> update($request->validated());
        return response()->okMessage('update', 200);
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


}
