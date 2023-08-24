<?php
/**
 * @file
 * @author Jan Doe <jandoe@example.com>
 * @version 1.0
 *
 * @section LICENSE
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
 *
 * @section DESCRIPTION
 *
 * The time class represents a moment of time.
 */



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
use Modules\Reviews\Jobs\CreateReviewsPreviewsJob;
use Modules\Reviews\Services\ContentPreviewService;
use Modules\Reviews\Services\ReviewContentStorage;
use Modules\Reviews\Transformers\Admin\ReviewContentResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Bus;
use Modules\Reviews\Services\ReviewContentService;


class ReviewContentController extends Controller
{


//    private ApiDataTableService $QueryBuilderByRequest;
//    private Target $targetModel;
//    private ReviewService $reviewService;
    private ReviewContentService $contentService;
//
    public function __construct(
        ReviewContentService $reviewContentService
//        ApiDataTableService $apiHandler,
//        Target $targetEntity
)    {
//        $this->QueryBuilderByRequest = $apiHandler;
//        $this->targetModel = $targetEntity;
////        $this->reviewService = $reviewService;
        $this->contentService = $reviewContentService;
    }

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

        //run job for

        $requestData = $request->validated();
        $filesInfo = [];
        if ($request->hasFile('files')) {
            $files = $request->file('files');
//save files
            foreach ($files as $file) {
                $reviewContentData  = ['review_id' => $requestData['reviewId'], 'message_id'=> ( $requestData['messageId'] ) ?? 0 ];
                $reviewContent = ReviewContent::create($reviewContentData);

                $fileInfo = $this->contentService->saveFileForContent($file, $reviewContent);

                $reviewContent->update( $fileInfo->toArray() );
                $filesInfo[] = $reviewContent->toArray();
            }
        }
        if(!$filesInfo) {
            return response()->error('Error save upload files');
        }

            return response()->ok($filesInfo, 200);

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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) {
        if (!$content = ReviewContent::find($id))    return response()->json(['message' => 'Review not found'], 404);
        $this->contentService->removeContent( $content);

        return response()->okMessage('Файл удален', 200);

    }

}
